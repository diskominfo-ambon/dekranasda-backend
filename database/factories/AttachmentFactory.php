<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $extension = $this->faker->fileExtension();

        return [
            'original_filename' => $this->faker->colorName(). '.'. $extension,
            'filename' => Str::random(12). '.'. $extension,
            'path' => $this->faker->filePath(),
            'content_type' => $this->faker->mimeType(),
            'byte_size' => random_int(500, 1000),
        ];
    }
}
