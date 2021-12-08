<head>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('chat/assets/css/template.bundle.css') }}">
    <link rel="stylesheet" href="{{ url('chat/assets/css/template.dark.bundle.css') }}" media="(prefers-color-scheme: dark)">
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
</head>
<div >
    <div class="card-body">
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_id') }}
            </div>
        @endif
        <form method="POST" action="{{ url('comments') }}">
            @csrf
            @honeypot
            <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
            <input type="hidden" name="commentable_id" value="{{ $model->id }}" />

            {{-- Guest commenting --}}
            @if(isset($guest_commenting) and $guest_commenting == true)
                <div class="form-group">
                    <label for="message">Enter your name here:</label>
                    <input type="text" class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                    @error('guest_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="message">Enter your email here:</label>
                    <input type="email" class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                    @error('guest_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @endif

            <!-- Chat: Form -->
            <form class="chat-form rounded-pill bg-dark" data-emoji-form="">
                <div class="row align-items-center gx-0">
                    {{-- <div class="col-auto">
                        <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                        </a>
                    </div> --}}

                    <div class="col">
                        <div class="input-group">
                            {{-- <textarea style="padding-left: 100px" class="form-control px-0" @if($errors->has('message')) is-invalid @endif" name="message" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true"></textarea> --}}
                            <input 
                            @keydown="sendTypingEvent"
                            @keyup.enter="sendMessage"
                            v-model="newMessage"
                            type="text"
                            name="message"
                            placeholder="Masukkan pesan anda..."
                            class="form-control">
                            {{-- <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                <span class="icon icon-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                </span>
                            </a> --}}
                        </div>
                    </div>
                    

                    <div class="col-auto">
                        <div class="clip-upload btn btn-icon btn-primary rounded-circle ms-5" >
                            <label for="file-input">
                                <i class="fa fa-paperclip fa-lg" aria-hidden="true"></i>
                           </label> 
                            <input style="display: none" type="file" class="file-input hide" name="file-input" id="file-input">
                            <div class="filename-container hide"></div>
                          
                        </div>
                        <button type="submit" class="btn btn-icon btn-primary rounded-circle ms-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Chat: Form -->
            <!-- Chat: Form -->

            {{-- <div class="form-group">
                <label for="message">Masukkan pesanmu disini:</label>
                <textarea style="background-color: #ebf1f7;" class="form-control @if($errors->has('message')) is-invalid @endif" name="message" rows="3"></textarea>
                <div class="invalid-feedback">
                    Your message is required.
                </div>
                </div>
            <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Submit</button> --}}
        </form>
    </div>
</div>
<br />