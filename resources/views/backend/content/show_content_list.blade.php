@extends('backend.master')

@section('page_title' ,'All Post List')

@section('body_content')

<div class="graph">
		<div class="tables">
	
			<table class="table table-bordered"> 
				<thead> 
					<tr> 
						<th>#</th> 
						<th>Content Name</th> 
						<th>Content Description</th>
						<th>Image name</th>
						<th>Action</th> 
					</tr> 
				</thead> 
				<tbody>
					
				 @foreach ($allContentList as $allContentListSingle)   
					<tr> 
						<th scope="row">{{ $allContentListSingle->id }}</th> 
						<td>{{ $allContentListSingle->content_name }}</td> 
						<td>{{ $allContentListSingle->content_description }}
							

						</td>
						<td>
							<img src="{{ URL::asset('public/images/'.$allContentListSingle->fileimage) }}" width="100px" height="100px" />
							
						</td> 
						<td>
							<a href="{{ route('content.edit', $allContentListSingle->id ) }}">

								<button type="submit" class="btn btn-default">Edit</button>

						    </a>

							<!-- <a href="{{ route('post.destroy', $allContentListSingle->id ) }}"> -->

							 {!! Form::open(['route' => ['content.destroy' , $allContentListSingle->id ],'files' => true , 'method' =>'delete']) !!}
								<button type="submit" class="btn btn-default">Delete</button>
							 {!! Form::close() !!}
							
							<!-- </a> -->


						</td> 
					</tr>
				 @endforeach 
				</tbody> 
			</table> 
		</div>
</div>

@stop