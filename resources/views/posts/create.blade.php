<x-app-layout>

    <div class="container mt-5">

        <div class="card p-4">

            <h2 class="mb-4">Create New Post</h2>

            <form action="{{ route('posts.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input type="text"
                           name="title"
                           class="form-control">
                </div>
                
                <div class="mb-3">

                    <label class="form-label">Category</label>

                    <select name="category_id" class="form-control">

                        <option value="">Select Category</option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">Status</label>

                    <select name="status" class="form-control">

                        <option value="Published">
                            Published
                        </option>

                        <option value="Draft">
                            Draft
                        </option>

                    </select>

                </div>

                <div class="mb-3 form-check">

                    <input type="checkbox"
                        name="is_featured"
                        value="1"
                        class="form-check-input">

                    <label class="form-check-label">
                        Featured Post
                    </label>

                </div>

             
                <div class="mb-3">
                    <label class="form-label">Featured Image</label>

                    <input type="file"
                        name="image"
                        class="form-control"
                        id="imageInput">

                    <img id="previewImage"
                        src="{{ isset($post) && $post->image ? asset('uploads/posts/' . $post->image) : '' }}"
                        style="width:150px;height:100px;object-fit:cover;
                                margin-top:10px;
                                border-radius:8px;
                                {{ isset($post) && $post->image ? '' : 'display:none;' }}">

                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>

                    <textarea name="content"
                              id="editor"
                              class="form-control"
                              rows="10"></textarea>
                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-success">
                        Save Post
                    </button>

                    <a href="{{ route('posts.index') }}"
                    class="btn btn-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>
<script src="https://cdn.tiny.cloud/1/kv358cmbfvdzm4z8y9595iuftqkksl8d3gcc0ytdsheibhmv/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

<script>

tinymce.init({

    selector: '#editor',

    height: 600,

    menubar: true,

    branding: false,

    plugins: [

        'advlist autolink lists link image charmap preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table code help wordcount'

    ],

    toolbar:

        'undo redo | ' +

        'blocks fontfamily fontsize | ' +

        'bold italic underline strikethrough | ' +

        'forecolor backcolor | ' +

        'alignleft aligncenter alignright alignjustify | ' +

        'bullist numlist outdent indent | ' +

        'link image media table | ' +

        'code preview fullscreen',

    fontsize_formats:

        '10px 12px 14px 16px 18px 20px 24px 30px 36px 48px',

    font_family_formats:

        'Arial=arial,helvetica,sans-serif;' +

        'Courier New=courier new,courier;' +

        'Georgia=georgia,palatino;' +

        'Tahoma=tahoma,arial,helvetica,sans-serif;' +

        'Times New Roman=times new roman,times;' +

        'Verdana=verdana,geneva;',

    block_formats:

        'Paragraph=p;' +

        'Heading 1=h1;' +

        'Heading 2=h2;' +

        'Heading 3=h3;' +

        'Heading 4=h4;' +

        'Heading 5=h5;' +

        'Heading 6=h6;',

    content_style: `

        body {

            font-family: Arial, sans-serif;

            font-size: 16px;

            padding: 15px;

        }

        h1 {

            font-size: 36px;

            font-weight: bold;

        }

        h2 {

            font-size: 30px;

            font-weight: bold;

        }

        h3 {

            font-size: 26px;

            font-weight: bold;

        }

        h4 {

            font-size: 22px;

            font-weight: bold;

        }

        p {

            font-size: 16px;

            line-height: 1.8;

        }

    `

});

</script>
<script>
document.getElementById('imageInput').addEventListener('change', function(event) {

    const preview = document.getElementById('previewImage');

    const file = event.target.files[0];

    if(file) {

        preview.src = URL.createObjectURL(file);

        preview.style.display = 'block';
    }
});
</script>