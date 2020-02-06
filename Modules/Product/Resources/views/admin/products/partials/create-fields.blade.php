<div class="box-body">
    {{ Form::normalInput('name', 'Name', $errors) }}
    {{ Form::normalInput('price', 'Price', $errors) }}
    {{ Form::normalFile('image', 'Image', $errors) }}
    {{ Form::normalTextarea('description', 'Description', $errors) }}
</div>
