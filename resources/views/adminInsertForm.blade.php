@extends('admin')

@section('admin-section')
    <style>
        .add_project {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .add-product-form-container {
            margin-bottom: 20px;
        }

        h3 {
            margin-bottom: 15px;
            font-size: 24px;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        #language_input {
            margin-bottom: 5px;
        }

        #add_language_button {
            padding: 5px 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            background-color: #5e7284;
            color: #fff;
            cursor: pointer;
        }

        #languages_container {
            margin-bottom: 15px;
        }

        #images_container {
            margin-bottom: 15px;
        }

        #add_image_button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #5e7284;
            color: #fff;
            cursor: pointer;
        }

        .add-product-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #18aa38;
            color: #fff;
            cursor: pointer;
        }

        .add-product-button:hover,
        #add_language_button:hover,
        #add_image_button:hover {
            background-color: #218838;
        }
    </style>

<div class="add_project container">
    <form action="{{route("insert-project")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="add-product-form-container">
            <div>
                <h3>ADD PROJECT</h3>
            </div>
            <input name="title" placeholder="title" type="text" required>
            <textarea name="short_description" placeholder="short description" maxlength="100" required></textarea>
            <input id="language_input" type="text" name=""  class="language" placeholder="languages">
            <button type="button" id="add_language_button">+</button>
            <div id="languages_container" class="languages_container">

            </div>
            <textarea placeholder="About Project" name="description" required></textarea>
            <textarea placeholder="The work I did on the project" name="worked_by_me" required></textarea>
            Images

            <button id="add_image_button" type="button">Add Image</button>

            <div id="images_container" class="images_container">

            </div>

            <button class="add-product-button" type="submit">Add Project</button>
        </div>
    </form>
</div>

@endsection
