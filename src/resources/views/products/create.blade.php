<!-- @extends('layouts.shop')
@section('title', 'Products - Create')
@section('content')
<div class="card">
	<div class="card-header">
		Product create
	</div>
	<div class="card-body">
		<form action="{{ route('products.store.v4') }}" method="POST">
			@csrf
			<div class="row mb-3">
				<label for="categories" class="col-sm-2 col-form-label">Category</label>
				<div class="col-sm-10">
					<select name="category_id" id="categories" class="form-control @error('category_id') is-invalid @enderror">
						<option selected="selected" disabled="disabled">Select Category</option>
						@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ trans($category->name) }}</option>
						@endforeach
					</select>
					@error('category_id')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', fake()->word()) }}">
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="description" class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', fake()->words(5, true)) }}</textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="row mb-3">
				<label for="identifier" class="col-sm-2 col-form-label">Identifier</label>
				<div class="col-sm-10">
					<input type="text" class="form-control @error('identifier') is-invalid @enderror" id="identifier" name="identifier" value="{{ old('identifier', fake()->ean13()) }}">
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary w-100">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection -->
@extends('layouts.shop')
@section('title', 'Products - Create')

@section('content')
@include('products.partials.product', [
	'title' => 'Product create',
	'route' => route('products.store.v5'),
	'name' => fake()->word(),
	'description' => fake()->words(5, true),
	'identifier' =>  fake()->ean13(),
	'category_id' => old('category_id')
])
@endsection

