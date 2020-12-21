<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class ImageExistence
 * @package App\Rules
 */
class ImageExistence implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $pathToFile)
    {
        $pathToFile = preg_replace('/^storage\//', '', $pathToFile);
        $pathToFile = config('filesystems.disks.public_upload.root') . '/' . $pathToFile;
        if (!file_exists($pathToFile)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Обложка не существует, проверьте пожалуйста указанный путь';
    }
}
