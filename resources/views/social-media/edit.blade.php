@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Social Media</h2>

    <form method="post" action="/console/social-media/edit/{{$social_media->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{old('name', $social_media->name)}}" required>

            @if ($errors->first('name'))
                <br>
                <span class="w3-text-red">{{$errors->first('name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="url">URL:</label>
            <input type="text" name="url" id="url" value="{{old('url', $social_media->url)}}" required>

            @if ($errors->first('description'))
                <br>
                <span class="w3-text-red">{{$errors->first('description')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="type">Type:</label>
            <input type="text" name="type" id="type" value="{{old('type', $social_media->type)}}" required>

            @if ($errors->first('type'))
                <br>
                <span class="w3-text-red">{{$errors->first('type')}}</span>
            @endif
        </div>
        <button type="submit" class="w3-button w3-green">Edit Social Media</button>

    </form>

    <a href="/console/social-media/list">Back to Social Media List</a>

</section>

@endsection
