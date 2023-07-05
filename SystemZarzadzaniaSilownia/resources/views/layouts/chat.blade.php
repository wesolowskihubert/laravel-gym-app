
                @php
                $data['messages'] = DB::table('messagesv')->orderBy('data', 'desc')->limit(15)->get()->toArray();
                @endphp
                @foreach(array_reverse($data['messages']) as $message)
                <!-- Message. Default to the left -->
                <div  class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">{{$message->kto}}</span>
                      <span class="direct-chat-timestamp float-right">{{$message->data}}</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{asset('/storage/images/'.$message->image)}}" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text @if(Auth::id()==$message->kto_id) your-message @endif">
                    {{$message->wiadomosc}}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->
                @endforeach



