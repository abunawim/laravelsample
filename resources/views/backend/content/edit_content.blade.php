@extends('backend.master')

@section('page_title' ,'Edit content')

@section('body_content')
<div class="outter-wp">
						
    <div class="graph-form">
                <div class="form-body">
                    
                    {!! Form::open(['route' => ['content.update' , $singleDataEdit->id ],'files' => true , 'method' =>'put']) !!}
                    
                    
                <div class="form-group"> 
                        <label for="posttitle">Content Name</label> 
                        <input type="text" class="form-control" id="posttitle" name="content_name" value="{{ $singleDataEdit->content_name}}"> 
                </div>

                <div class="form-group"> 
                    <label for="exampleInputPassword1">Content Description</label> 
                     <textarea rows="6" class="form-control1 control2" placeholder="Description :" name="content_description">{{ $singleDataEdit->content_description}}</textarea>
                </div>

                <div class="col-md-12 form-group2 group-mail">
                  <label class="control-label">Sports</label>
                    <select name="sports">
                        @if($singleDataEdit->sports == '1')
                        <option value="1" selected="selected" >Cricket</option>
                        <option value="2" >Football</option>
                        
                        @else
                        <option value="2" selected="selected">Football</option>
                        <option value="1"  >Cricket</option>
                        @endif
                    </select>
                </div>

                <div class="col-md-12 form-group">
                  <div class="checkbox1">
                    <label class="check">
                      <input type="checkbox" ng-model="model.winner" required="" class="ng-invalid ng-invalid-required" name="content_active" 
                       @if($singleDataEdit->content_active == 'on')
                       checked
                       @endif
                      >
                      Content Inactive
                    </label>
                  </div>
                </div>

                <div class="form-group"> 
                    <label for="exampleInputFile">Content Image</label> 
                    <input type="file" id="exampleInputFile" name="fileimage" value="{{ $singleDataEdit->fileimage}}">
                    <img src="{{ URL::asset('public/images/'.$singleDataEdit->fileimage) }}" width="100px" height="100px" /> 
                </div>
                        
                        <button type="submit" class="btn btn-default">Update</button> 
                    {!! Form::close() !!}
                </div>

    </div>
</div>

@stop