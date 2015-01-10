<?php

class CreateEntryManager extends BaseManager implements ManagerInterface {

    public function getRules()
    {
        return [
            'title' => 'required',
            'content' => '',
            'author_id' => 'required|integer',
        ];
    }

    public function save()
    {
        $this->isValid();
        $this->isValidSlug();
        $this->model->fill($this->data);
        $this->model->save();

        return true;
    }

    protected function isValidSlug(){
        $slugs = $this->entryRepository->getNumberOfSlugs($this->data['slug']);

        if($slugs > 0 ){
            return;
        }else{
            $this->data['slug'] = $this->data['slug'].$slugs;
        }
    }

}