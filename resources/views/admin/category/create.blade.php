
@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Category</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="categories.html" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="{{ route('categories.store') }}" method="post" id="categoryForm">
                @csrf
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    <p class="invalid-feedback"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                                    <p class="invalid-feedback"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

@endsection

@section('custom')
<script>
    $(document).ready(function() {
        $("#categoryForm").submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            
            // Serialize the form data
            var formData = $(this).serialize();

            // Send an AJAX request
            $.ajax({
                url: "{{ route('categories.store') }}",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    // Handle successful response
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle errors
                    console.error("AJAX error: " + textStatus, errorThrown);
                }
            });
        });
    });
</script>
@endsection













{{-- @extends('admin.layouts.app')


@section('content')
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="categories.html" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						
                        <form action=""  method="post" id="categoryForm" name="categoryForm">
                            @csrf
                            <div class="card">
							<div class="card-body">								
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                                            <p></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="slug">Slug</label>
											<input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                                            <p></p>	
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="mb-3">
											<label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Block</option>
                                                </select>
										</div>
									</div>									
								</div>
							</div>							
						    </div>
						
                        <div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="#" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
                    </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->

@endsection


@section('custom')
<script>
$("#categoryForm").submit(function(event) {
    event.preventDefault(); // Corrected typo here

    var element = $(this);
    $.ajax({
        url: "{{ route('categories.store') }}",
        type: "post",
        data: element.serialize(),
        dataType: "json", // Corrected syntax here
        success: function(response) {
            var errors = response.errors;
            if (errors.name) {
                $("#name")
                    .addClass("is-invalid")
                    .siblings('p') // Corrected typo here
                    .addClass('invalid-feedback')
                    .html(errors.name); // Corrected syntax here
            } else {
                $("#name")
                    .removeClass("is-invalid")
                    .siblings('p') // Corrected typo here
                    .removeClass('invalid-feedback')
                    .html(" ");
            }

            if (errors.slug) {
                $("#slug")
                    .addClass("is-invalid")
                    .siblings('p') // Corrected typo here
                    .addClass('invalid-feedback')
                    .html(errors.slug); // Corrected syntax here
            } else {
                $("#slug")
                    .removeClass("is-invalid")
                    .siblings('p') // Corrected typo here
                    .removeClass('invalid-feedback')
                    .html(" ");
            }
        },
        error: function(jqXHR, exception) {
            console.log("Something went wrong"); // Corrected syntax here
        }
    });
});
</script>
@endsection






{{-- @section('custom')
$("#categoryForm").submit(function(event)){
    event.preeventDefult();
    var element = $(this);
    $.ajax({
        url:"{{ route("categories.store") }}",
        type:"post",
        data:element.serializeArray(),
        dataType:"",
        success:function(response){

            var errors = response['errors'];
            if(errors['name']){
                $.("#name")
                .addClass("is-invalid")
                .shiblings('p')
                .addClass('invalid-feedback')
                .html(errors['name']);
            }else{
                $.("#name")
                .removeClass("is-invalid")
                .shiblings('p')
                .removeClass('invalid-feedback')
                .html(" ");


            }

            if(errors['slug']){
                $.("#slug")
                .addClass("is-invalid")
                .shiblings('p')
                .addClass('invalid-feedback')
                .html(errors['slug']);
            }else{
                $.("#slug")
                .removeClass("is-invalid")
                .shiblings('p')
                .removeClass('invalid-feedback')
                .html(" ");


            }


        }, error:function(jqXHR,exception){

            consol.log("somethig went Wrong");
        }
    })
}


@endsection --}} --}}