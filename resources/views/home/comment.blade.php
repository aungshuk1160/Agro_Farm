<section style="background-color: #bad4be;">
    <!--comment and reply system start -->
    <div style="text-align:center; padding-bottom:30px"><br><br>
        <h1 style="font-family: 'Poppins', sans-serif; text-align: center; padding-top: 20px; padding-bottom: 20px; font-weight: bold; color: #333;">Comments</h1>
         <br>
        <form action="{{url('add_comment')}}" method="POST">
            @csrf 
            <textarea style="height:20px; width:500px; border-radius: 30px; padding-right: 30px; padding-left: 30px;" placeholder="Comment something here" name="comment"></textarea>
            <br>

            <input type="submit" class="btn btn-primary" style="border-radius: 20px" value="Comment">
         </form>   
      </div>

      <div style="padding-left:20%;"> 
         <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>

         @foreach($comment as $comment)
         <div>
            <button style=" border: none; background-color: #5b9671; color: white; border-radius: 20px; padding: 5px 10px;">
               {{$comment->name}}
            </button>
            <p style="margin-left: 10px;">{{$comment->comment}}</p>
            <a style="margin-left: 10px; font-weight: bold;" href="javascript:void(0);" onclick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>

            @foreach($reply as $rep)  
            @if($rep->comment_id==$comment->id)

            <div style="padding-left: 3%; padding-bottom: 7px;">
            <button style=" border: none; background-color: #5b9671; color: white; border-radius: 20px; padding: 5px 10px;">
               {{$rep->name}}
            </button>
               
            <p style="margin-left: 10px;">{{$rep->reply}}</p>
               
            </div>
            @endif
            @endforeach
         </div>   
         @endforeach

         <!-- reply textbox (0nly 1 instance) -->
         <div style="display: none;" class="replyDiv">
            <form action="{{url('add_reply')}}" method="POST">
               @csrf
               <input type="hidden" id="commentId" name="commentId">  
               <textarea style="height: 50px; width:500px; border-radius: 35px; padding-left: 30px;" name="reply" placeholder="Write something here"></textarea>
               <br>
                    <div style="margin-left: 342px;">
                     <button type="submit" class="btn btn-secondary">Submit</button>
                     <a href="javascript:void(0);" class="btn btn-danger" onclick="reply_close(this)">Close</a>
                    </div>
            </form>
         </div>
      </div>

      <script type="text/javascript">
         function reply(caller)
         {
            $('.replyDiv').hide(); 
            document.getElementById('commentId').value = $(caller).attr('data-commentid');
            $(caller).after($('.replyDiv')); 
            $('.replyDiv').show();
         }
         
         function reply_close()
         {
            $('.replyDiv').hide(); 
         }
      </script>

      <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
         });

         window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
         };
      </script>


      
      <!--comment and reply system end here -->
      <br><br>
</section>