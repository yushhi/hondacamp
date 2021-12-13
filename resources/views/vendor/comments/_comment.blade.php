@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->id }}" class="media">
@else
  <li id="comment-{{ $comment->id }}" class="media">
@endif
    {{-- <img class="mr-3" src="/images/{{ $comment->commenter->avatar ?? $comment->avatar }}" style="height:35px;width:35px; border-radius:50%;" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar"> --}}
    <div class="media-body">
        {{-- <h5 class="mt-0 mb-1" style="font-size: 14px">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="time-since">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div style="white-space: pre-wrap; font-size: 16px; color: #202020;">{!! $markdown->line($comment->comment) !!}</div> --}}

        <!-- Message -->
        <div class="message">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                <img class="avatar-img" src="/images/{{ $comment->commenter->avatar ?? $comment->avatar }}" alt="">
            </a>

            <div class="message-inner">
                <div class="message-body">
                    <h5 class="mt-0 mb-1" style="font-size: 14px">{{ $comment->commenter->name ?? $comment->guest_name }} </h5>
                    <div class="message-content">
                        <div class="message-text">
                            <p>{!! $markdown->line($comment->comment) !!}</p>
                        </div>

                        <!-- Dropdown -->
                        {{-- <div class="message-action">
                            <div class="dropdown">
                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <span class="me-auto">Edit</span>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <span class="me-auto">Reply</span>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                            <span class="me-auto">Delete</span>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="message-footer">
                    <span class="extra-small text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        

        {{-- <div class="row">
            @can('reply-to-comment', $comment)
                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase" style="color: #5c5c5c; font-size: 12px;"><i class="fas fa-comments" style="font-size: 16px; padding-right: 8px"></i>Balas</button>
            @endcan
            @can('edit-comment', $comment)
                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase" style="color: #5c5c5c; font-size: 12px"><i class="fas fa-pencil-alt" style="font-size: 16px; padding-right: 8px"></i>Edit</button>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-sm btn-link text-danger text-uppercase" style="font-size: 12px"><i class="fas fa-trash-alt" style="font-size: 16px; padding-right: 8px"></i>Delete</a>
                <form id="comment-delete-form-{{ $comment->id }}" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div> --}}

        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Comment</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Update your message here:</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Reply to Comment</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Balas pesan:</label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->id))
            @foreach($grouped_comments[$comment->id] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif