<div class="box-body">
    {{ Form::normalInput('name', 'Name', $errors, $product) }}
    {{ Form::normalInput('price', 'Price', $errors, $product) }}
    {{ Form::label('originalImage', 'Original Image') }} <br>
    <img src="{{ asset("assets/media/$product->image") }}" alt=""/>
    {{ Form::normalFile('image', 'Image', $errors, $product) }}
    {{ Form::normalTextarea('description', 'Description', $errors, $product) }}
</div>
