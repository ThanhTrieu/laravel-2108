@extends('admin.layout-admin')

@php
    $showHeading  = false;
    $buttonReport = false;
@endphp

@section('title', 'Add Role')
@section('namePageHeading', 'Add Role')

@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-primary mb-3" href="{{ route('admin.roles') }}">List role</a>
            <div class="alert alert-danger my-3" style="display:none">
            </div>
            <form>
                {{-- form crear role --}}
                <div class="form-group">
                    <label>Name</label>
                    <input id="nameRole" type="text" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="descriptionRole" name="description" class="form-control"></textarea>
                </div>
                {{-- list permissions --}}
                <hr/>
                @foreach ($permission as $item)
                    <div class="row">
                        <div class="col">
                            <p>
                                <input class="permission" type="checkbox" id="permit_{{ $item->id }}" value="{{ $item->id }}" />
                                <span>{{ $item->name }}</span>
                            </p>
                        </div>
                    </div>  
                @endforeach
                <hr/>
                <button class="btn btn-primary add-role" type="button"> Add </button>
                <input id="strIdPermission" value="" type="hidden" />
            </form>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(function(){
        function addListIdPermission(){
            let strId = "";
            $('.permission').each(function(){
                if($(this).is(':checked')){
                    strId += strId === "" ? $(this).val().trim() : "," + $(this).val().trim();
                }
            });
            $('#strIdPermission').val(strId);
            let ids = $('#strIdPermission').val().trim();
            return ids;
        }

        $('.add-role').click(function(){
            let self = $(this);
            let strIdPermission = addListIdPermission();
            let nameRole = $('#nameRole').val().trim();
            let descriptionRole = $('#descriptionRole').val().trim();
            $.ajax({
                url: "{{ route('admin.handle.add.role') }}",
                type: "POST",
                data: {nameRole, descriptionRole, strIdPermission},
                beforeSend: function(){
                    self.text('Loading ... ');
                },
                success: function(response){
                    self.text('Add');
                    if(response.hasOwnProperty('errors')){
                        // co loi tra ve
                        $('.alert-danger').show();
                        $.each(response.errors, function(key, value){
                            $('.alert-danger').append('<p class="mb-0">'+value+'</p>')
                        });
                    } else if(response.hasOwnProperty('fails')) {
                        $('.alert-danger').empty();
                        $('.alert-danger').show();
                        $('.alert-danger').append('<p class="mb-0">'+response['fails']+'</p>')
                    } else {
                        alert(response['success']);
                    }
                }
            })
        });
    });
</script>
@endpush