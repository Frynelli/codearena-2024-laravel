@extends('layouts.app')

@section('content')
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the blog</h2>
      </div>
      <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      
        @if($posts ->isEmpty())
            <p class="text-center">No posts found.</p>
        @else
          @foreach ($posts as $post)
              <x-post :post="$post" />
          @endforeach
        @endif   
      </div>
      <div class="mt-10">
        {{ $posts->links() }}
      </div>
      <section id="authors">
        <div class="mx-auto mt-16 flex max-w-2xl flex-col gap-x-8 gap-y-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
          @if($authors->isEmpty())
          <p>No authors found.</p>
          @else
          <h2 class="text-balance text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Authors</h2>
            <ul role="list" class="grid grid-cols-2 divide-y divide-gray-100 ml-2">
              @foreach ($authors as $author)
              <li class="flex justify-between gap-x-6 py-4">
                <div class="flex min-w-0 gap-x-4">
                  <div class="min-w-0 flex-auto">
                    <p class="text-sm/6 font-semibold text-gray-900">{{$author->name}}</p>
                  </div>
                </div>
               
              </li>
            @endforeach
            </ul>
              
        @endif
          </div>
      </section>
    </div>
  </div>

@endsection
