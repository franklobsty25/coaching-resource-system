<?php

namespace App\Livewire\Forms;

use App\Models\Resource;
use App\ResourceTypeEnum;
use App\Util;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Livewire\WithFileUploads;

class ResourceForm extends Form
{
    use WithFileUploads, Util;

    public ?Resource $resource;

    public $title;
    public $description;
    public $type;
    public $thumbnail;
    public $files = [];
    public $isEdit = false;

    protected function rules(): array
    {
        $thumbnailRules = [
            'nullable',
            'image',
            'mimes:jpeg,jpg,png,webp,avif',
        ];

        $fileRules = [
            'mimes:jpeg,jpg,png,webp,avif,pdf,mp3,wav,aac,flac,aiff,mpeg,mpg,mp4,mov,mkv,webm,flv,ogg,ogv,avi',
            'max:2048',
        ];

        return [
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'type' => ['required', Rule::enum(ResourceTypeEnum::class)],
            'thumbnail' => array_merge($this->isEdit ? ['nullable'] : $thumbnailRules, []),
            'files.*' => array_merge($this->isEdit ? ['nullable'] : ['required'], $fileRules),
        ];
    }

    public function setResource(Resource $resource)
    {
        $this->isEdit = true;
        $this->resource = $resource;
        $this->title = $resource->title;
        $this->description = $resource->description;
        $this->type = $resource->type;
    }


    public function store()
    {
        $this->validate();

        if ($this->thumbnail) {
            $this->thumbnail = ResourceForm::uploadSingleFile($this->thumbnail);
        }

        if (!$this->files) {
            throw new \Exception('Files must be present');
        }

        $merged_paths = ResourceForm::uploadMultipleFiles($this->files);

        Resource::create([
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'thumbnail' => $this->thumbnail,
            'paths' => $merged_paths,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function update()
    {
        $this->validate();

        if ($this->thumbnail) {
            $this->thumbnail = ResourceForm::uploadSingleFile($this->thumbnail);
        }

        if ($this->files) {
            $merged_paths = ResourceForm::uploadMultipleFiles($this->files);
        }

        $this->resource->update([
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'thumbnail' => $this->thumbnail ?? $this->resource->thumbnail,
            'paths' => $merged_paths ?? $this->resource->paths,
        ]);
    }
}
