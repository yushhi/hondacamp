@php
    if (isset($approved) and $approved == true) {
        $comments = $model->approvedComments;
    } else {
        $comments = $model->comments;
    }
@endphp

@if($comments->count() < 1)
    <div class="alert alert-warning">There are no comments yet.</div>
@endif

<style>
    .hidden-scrollbar {
  color:white;  
  overflow:hidden;
  text-align:justify;    
}

.hidden-scrollbar .inner {
  height:250px;
  overflow:auto;
  margin:15px -300px 15px 15px;
  padding-right:300px; /* Samakan dengan besar margin negatif */
}
</style>

<div class="hidden-scrollbar">
    <div class="inner">
        <ul class="list-unstyled">
            @php
                // $grouped_comments = $comments->sortByDesc('created_at')->groupBy('child_id');
                $grouped_comments = $comments->groupBy('child_id');
            @endphp
            @foreach($grouped_comments as $comment_id => $comments)
                {{-- Process parent nodes --}}
                @if($comment_id == '')
                    @foreach($comments as $comment)
                        @include('comments::_comment', [
                            'comment' => $comment,
                            'grouped_comments' => $grouped_comments
                        ])
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>
    
</div>

@auth
    @include('comments::_form')
@elseif(config('comments.guest_commenting') == true)
    @include('comments::_form', [
        'guest_commenting' => true
    ])
@else
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Authentication required</h5>
            <p class="card-text">You must log in to post a comment.</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
        </div>
    </div>
@endauth


