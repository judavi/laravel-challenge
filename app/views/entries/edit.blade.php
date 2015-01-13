{{Form::open(['method' => 'put', 'route' => ['entries.update', $entry->id], 'role' => 'form', 'class' => 'form'])}}

    {{Field::text('title', $entry->title)}}
    {{Field::textarea('content', $entry->content)}}
    {{Field::text('slug', $entry->slug)}}

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 col-md-offset-0 col-sm-12">
            {{Form::submit('Update', array('class' => 'btn btn-primary'))}}
        </div>
    </div>
{{Form::close()}}

