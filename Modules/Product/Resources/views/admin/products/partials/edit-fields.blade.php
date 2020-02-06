<div class="box-body">
    {{ Form::normalInput('name', 'Name', $errors, $product) }}
    {{ Form::normalInput('price', 'Price', $errors, $product) }}
    {{ Form::normalFile('image', 'Image', $errors, $product) }}
    {{ Form::normalTextarea('description', 'Description', $errors, $product) }}
</div>
