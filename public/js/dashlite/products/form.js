$(document).ready(main);



class FileRequired {

  getMessage() {
    return 'Unggahan wajib dimasukan terlebih dahulu';
  }

  valid(files) {
    const file = files[files.length - 1].file;

    if (file !== null ) return true;
  }

}

class FileMaxInput {

  constructor(maxUploader) {
    this.maxUploader = maxUploader;
  }

  getMessage() {
    return `Unggahan maximal hanya boleh ${this.maxUploader} berkas`;
  }

  valid(files) {
    if (files.length <= this.maxUploader) return true;
  }

}

class FileMaxSize {

  constructor(max) {
    this.max = max;
  }


  getMessage() {
    return `Ukuran file terlalu besar, max ${this.max} KB`;
  }

  valid(files) {
    const file = files[files.length - 1].file;

    if (parseInt(file.size / 1024) <= this.max) return true;
  }
}

function main() {
  const MAX_FILES_UPLOADER = 3;
  let currentFiles = [];

  $('input[type="file"]').on('change', async function (event) {
    const target = event.target;
    const file = target.files[0];
    const uniqidId = new Date().getTime();

    currentFiles.push({ file, uniqidId });
    const message = validate(currentFiles, [new FileRequired(), new FileMaxInput(MAX_FILES_UPLOADER), new FileMaxSize(700)]);

    if (typeof message === 'string') {
      NioApp.Toast(message, 'warning', {
        position: 'bottom-right',
      });


      currentFiles.splice(0, 1);
      return;
    }

    $('#currentFileCount')
      .text(currentFiles.length);

    try {


      const url = location.origin + '/uploaders';
      const $container = $('#uploader-container');

      const result = await resolveFileUpload(url, file, {

        beforeSend: () => {
          const $fileDom = buildFileCard(file, uniqidId);
          const $progressDom = buildProgress(uniqidId);

          $container.append([
            $fileDom,
            $progressDom
          ]);
        },
        onProgress: percent => {
          $(`div[data-progress-uniqid-id="${uniqidId}"]`)
            .addClass(() => {
              return percent >= 100 && 'bg-success'
            })
            .css({
              width: percent + '%'
            });
        }
      });

      /**
       * Menambahkan tombol toolbar untuk hasil upload berkas.
       */

      $container
        .find(`div[data-uniqid-id="${uniqidId}"]`)
        .append([
          $('<a/>', {
            class: 'btn btn-sm',
            href: `${window.location.origin}/${result?.data?.path}`,
            target: '__blank',
            text: 'Lihat',
          }),
          $('<button/>', {
            class: 'btn btn-sm text-danger',
            text: 'Hapus',
            type: 'button',
            on: {
              click: () => handleRejectedFile({...result?.data, uniqidId})
            }
          }),
        ]);

        const $input = $('<input/>', {
          readonly: true,
          type: 'number',
          class: 'd-none',
          name: 'attachments[]',
          required: true,
          value: result?.data?.id,
          'data-input-uniqid-id': uniqidId
        });

        $('#attachments').append($input);

    } catch (res) {
      NioApp.Toast(res.message, 'warning', {
        position: 'bottom-right',
      });
    }
  });

  /**
   * Menyelesaikan penghapusan file saat ditolak.
   *
   * @param {object<UploaderResponse>} result
   * @return void
   */
  function handleRejectedFile({id, originalFilename, uniqidId }) {
    const confirmed = confirm(`Yakin ingin menghapus file ${originalFilename}?`);

    if (!confirmed) return;

    const url = `${window.location.origin}/uploaders/${id}`;
    resolveRejectedFileById(url)
      .then(res => {
        /**
         * Menghapus [file card uploader] dari DOM dengan menggunakan selector [uniqidId].
         */
        currentFiles = currentFiles.filter( current => current.uniqidId !== uniqidId);

        $(`#uploader-container div[data-uniqid-id="${uniqidId}"], #uploader-container div[data-progress-uniqid-id="${uniqidId}"]`)
        .parent()
        .remove();

        $(`input[data-input-uniqid-id="${uniqidId}"]`)
          .remove();

        $('#currentFileCount')
          .text(currentFiles.length);
      })
      .catch(res => {
        throw new Error(err);
      });

  }
}


function validate(files, rules) {

  for (const rule of rules) {
    if (!rule.valid(files)) {
      return rule.getMessage();
    }
  }

  return true;
}


function resolveRejectedFileById(url) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url,
      method: 'DELETE',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: res => resolve(res),
      error: res => reject(res)
    });
  });
}


/**
 * Membuat indikator progress DOM dengan context [uniqidId].
 *
 * @param {int} uniqidId
 * @returns
 */
function buildProgress(uniqidId) {

  return $('<div/>', { class: 'progress mt-1'})
    .append(
      $('<div/>', {
        class: 'progress-bar progress-bar-striped progress-bar-animated',
        'data-progress-uniqid-id': uniqidId,
        'data-progress': 0
      })
    );
}


/**
 * Membuat DOM hasil respon berkas dengan context [uniqidId].
 *
 * @param {object} file
 * @returns
 */
function buildFileCard({ name, size }, uniqidId) {
  const $card = $('<div/>', {
    class: 'border px-2 py-1 rounded d-flex align-items-center justify-content-between'
  });

  const $children = $('<div></div>')
    .append([
      $('<p/>', { class: 'm-0' }).text(
        name.length >= 70
          ? name.substr(0, 70) + '...'
          : name
      ),
      $('<small/>').text(`Ukuran unggahan ${ parseInt(size / 1024) } KB`)
    ]);

  $card.append([
    $children,
    $('<div/>', {
      'data-uniqid-id': uniqidId
    })
  ]);

  return $card;
}

/**
 * Menyelesaikan upload berkas.
 *
 * @param {string} url
 * @param {object<File>} file
 * @param {object} options
 * @return Promise<object<UploaderResponse>>
 */
function resolveFileUpload(url, file, options) {

  const formBody = new FormData();
  formBody.append('uploader', file);

  return new Promise((resolve, reject) => {
    $.ajax({
      url,
      method: 'POST',
      beforeSend: () => options?.beforeSend(),
      xhr: () => {
        const xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", evt => {
          if (evt.lengthComputable) {
              const percentComplete = (evt.loaded / evt.total) * 100;
              options?.onProgress(Math.round(percentComplete));
          }
        }, false);

        return xhr;
      },
      data: formBody,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      error: res => reject(res),
      success: res => resolve(res),
      processData: false,
      contentType: false
    });

  });
}
