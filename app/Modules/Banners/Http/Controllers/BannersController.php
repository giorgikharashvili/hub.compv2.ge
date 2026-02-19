<?php

namespace Flute\Modules\Banners\Http\Controllers;

use Flute\Core\Support\BaseController;
use Flute\Core\Support\FileUploader;

class BannersController extends BaseController
{
    public function uploadImage(FileUploader $fileUploader)
    {
        try {
            if (!user()->can('admin.system')) {
                return $this->json([
                    'success' => false,
                    'message' => __('def.no_access')
                ], 403);
            }

            $request = request();
            
            if (!$request->files->has('image')) {
                return $this->json([
                    'success' => false,
                    'message' => __('banners.settings.invalid_file')
                ], 400);
            }

            $file = $request->files->get('image');
            
            if (!$file || !$file->isValid()) {
                return $this->json([
                    'success' => false,
                    'message' => __('banners.settings.invalid_file')
                ], 400);
            }

            $imagePath = $fileUploader->uploadImage($file, 5);

            return $this->json([
                'success' => true,
                'url' => $imagePath,
                'full_url' => url($imagePath)
            ]);

        } catch (\Exception $e) {
            logs()->error('Banner upload error: ' . $e->getMessage());
            
            return $this->json([
                'success' => false,
                'message' => __('banners.settings.upload_error')
            ], 500);
        }
    }
} 