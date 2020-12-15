@props(['post' => $post])

<div class="mb-4">
    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->username}}</a> <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
    <p class="mb-2">{{$post->body}}</p>

    @if ($post->ownedBy(auth()->user()))
        <div>
            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        </div>                           
    @endif
    <div class="flex items-center">
    @auth
        {{-- showing the like/unlike button based on actions--}}
        @if (!$post->likedBy(auth()->user()))
            <form action="{{route('posts.likes',$post->id)}}" method="POST" class="mr-1">
                @csrf
                <button class="text-blue-500" type="submit">Like</button>
            </form>                               
        @else
            <form action="{{route('posts.likes',$post->id)}}" method="POST" class="mr-1">
                @csrf
                {{-- Method spoofing --}}
                @method('DELETE')
                <button class="text-blue-500" type="submit">Unlike</button>
            </form>
        @endif 
        
    @endauth                         
        <span>{{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}</span>
    </div>
</div>
