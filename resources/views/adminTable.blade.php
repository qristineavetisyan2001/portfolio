@extends('admin')

@section('admin-section')

<div class="adminTable">
    <div class="table_container p-2 m-5">
        <table class="table">
            <thead>
            <tr class="text-center align-middle">
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Short Description</th>
                <th scope="col">Languages</th>
                <th scope="col">Description</th>
                <th scope="col">Worked by me</th>
                <th scope="col">Images</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr class="text-center align-middle">
                    <th scope="row">{{$project->id}}</th>
                    <td>{{$project->title}}</td>
                    <td>{{$project->short_description}}</td>
                    <td>
                        @foreach($project->lang as $lang)
                            <span>{{$lang->name}}</span>
                        @endforeach
                    </td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->worked_by_me}}</td>
                    <td>
                        @foreach($project->image as $image)
                            <img width="50px" height="50px" src="{{asset("storage/uploads/".$image->image_path)}}"
                                 alt="">
                        @endforeach
                    </td>
                    <td>
                        <button id="{{'editModalButton'.$project->id}}" type="button"
                                class="btn btn-primary editModalButton" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td>
                        <form action="{{route('deleteProject', $project->id)}}">
                            @csrf
                            <button class="border-red border border-4" type="submit">
                                <i class="p-2 bg-red icon_delete fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-dark fs-5" id="staticBackdropLabel">EDIT PROJECT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForms" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="add-product-form-container">
                            <label for="editProjectTitle">Title</label>
                            <input id="editProjectTitle" name="title" placeholder="project title" type="text"
                                   class="w-100">
                            <label for="editProjectShortDescription">Short Description</label>
                            <textarea id="editProjectShortDescription" placeholder="project short description"
                                      name="short_description" class="w-100"></textarea>
                            <label for="editProjectDescription">Description</label>
                            <textarea id="editProjectDescription" placeholder="project description"
                                      name="description" class="w-100"></textarea>
                            <label for="editProjectWorkedByMe">Worked By Me</label>
                            <textarea id="editProjectWorkedByMe" placeholder="project worked by me"
                                      name="worked_by_me" class="w-100"></textarea>
                            <label for="language_input">Languages</label>
                            <input id="language_input" type="text" name="" id="" class="language mt-3">
                            <button type="button" id="add_language_button">+</button>
                            <div id="languages_container" class="languages_container">

                            </div>
                            <div id="edit_langs_container" class="edit-langs-container mt-3">

                            </div>
                            <label for="add_image_button">Images</label>
                            <button id="add_image_button" type="button">+</button>

                            <div id="images_container_edit" class="images_container">

                            </div>
                            <div id="add_images_container" class="add-images-container d-flex mt-3">

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

        const addLanguageEdit = () => {
            if ($("#language_input").val()) {

                const content = $("#language_input").val();
                $("#language_input").val("");
                const newLanguage = $(`<input class="language_block ml-2 mt-2" value=${content} type="text" name="langs[]">`);

                $("#edit_langs_container").append(newLanguage);
            }
        }

        $("#add_language_button").click(() => addLanguageEdit());

        const addImageEdit = () => {
            const newImage = $(`<input name="images[]" class="images_block" type="file">`);
            $("#add_images_container").append(newImage);
        }

        $("#add_image_button").click(() => addImageEdit());


        @foreach($projects as $project)
        $('{{'#editModalButton'.$project->id}}').on('click', () => {
            $('#staticBackdrop').addClass('show').slideToggle(300)
            $('#editProjectTitle').val('{{$project->title}}');
            $('#editProjectShortDescription').val('{{$project->short_description}}');
            $('#editProjectDescription').val('{{$project->description}}');
            $('#editProjectWorkedByMe').val('{{$project->worked_by_me}}');


            $('#edit_langs_container').empty();
            @foreach($project->lang as $index => $lang)
            $("#edit_langs_container").append('<input class="language_block ml-2" name="langs[]" value="{{$lang->name}}">');
            $("#edit_langs_container").append('<input hidden value = {{$lang->id}} name="ids[]" }">');
            @endforeach

            $('#add_images_container').empty();
            @foreach($project->image as $index => $image)
            var elementId = '#editProjectImage{{$index+1}}';
            $("#add_images_container").append(
                '<div class = "edit_image_container" id="edit_image_container_{{$project->id}}_{{$image->id}}">' +
                '<label id="editProjectImage{{$index+1}}" class="image-input-label" for="image{{$index+1}}"></label>'
                +
                `<div><button type="button" id="delete_button_{{$project->id}}_{{$image->id}}" class="delete-button border-red border border-4">
                    <i class="p-1 bg-red icon_delete fa-solid fa-trash"></i>
                </button></div>
                </div>
            `);
            $("#add_images_container").append('<input hidden value = {{$image->id}} name="image_ids[]" }">');

            $(elementId).css('background-image', 'url("{{ asset("storage/uploads/".$image->image_path)}}")');
            if({{$image->status}}) {
                $("#edit_image_container_{{$project->id}}_{{$image->id}}").append('<div><input checked type="radio" name="main_image" value={{$image->id}}>'+'<label>main image</label></div>')
            }
            else{
                $("#edit_image_container_{{$project->id}}_{{$image->id}}").append('<input type="radio" name="main_image" value={{$image->id}}>'+'<label>main image</label>')

            }
            $('#delete_button_{{$project->id}}_{{$image->id}}').click(()=>{
                $("#edit_image_container_{{$project->id}}_{{$image->id}}").append('<input name="deleted_image_ids[]" hidden value={{$image->id}}>')
                $('#edit_image_container_{{$project->id}}_{{$image->id}}').hide();
            });

            @endforeach

            $("#editForms").attr('action', '{{route('editProject', $project->id)}}');
        })
        $('.btn-close').click(function () {
            $('.modal').removeClass('show').slideToggle(200)
        })
        @endforeach

    </script>

@endsection
