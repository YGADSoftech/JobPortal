@extends('Employer.EmployerMasterLayout.master')

@section('sidebar')
@if(Illuminate\Support\Facades\Auth::user()->user_type_id == 3)
<ul class="sidebar-menu" id="nav-accordion">


                <li>
                    <a href="{{route('employerProfile')}}" class="active">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-building"></i>
                        <span>Manage Company</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('EmployerCompany.create')}}">Create a Company</a></li>
                        <li><a href="{{ route('EmployerCompany.index') }}">View Company</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-book"></i>
                        <span>Manage Job Posts</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('EmployerJob.create')}}">Create Job Post</a></li>
                        <li><a href="{{ route('EmployerJob.index') }}">View Job Post</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent ">
                        <i class="fa fa-cogs"></i>
                        <span>Manage Applicants</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block;">
                        <li><a href="{{ route('viewapplyapplicants')}}">View Applied Applicants</a></li>
                    </ul>
                </li>
            </ul>
    @elseif(Illuminate\Support\Facades\Auth::user()->user_type_id == 2)
    <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('applicantProfile')}}" class="active">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-laptop"></i>
                        <span>Jobs</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><form action="{{route('viewsearchform')}}" method="get">
                                <button type="submit" class="btn btn-link"><a>Search Jobs</a></button></form></li>
                        <li><a href="{{ route('viewapplyjobs')}}">View Apply Jobs</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-book"></i>
                        <span>Education</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('ApplicantEducation.create')}}">Create Education Degree</a></li>
                        <li><a href="{{ route('ApplicantEducation.index') }}">View Education Degrees</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-cogs"></i>
                        <span>Experience</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block;">
                        <li><a href="{{ route('ApplicantExperience.create')}}">Create Experience Record</a></li>
                        <li><a href="{{ route('ApplicantExperience.index') }}">View Experience Record</a></li>

                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-star"></i>
                        <span>Skills</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('ApplicantSkill.create')}}">Create Skill Set</a></li>
                        <li><a href="{{ route('ApplicantSkill.index') }}">View Skill Set</a></li>
                    </ul>
                </li>
            </ul>
        @endif
@endsection

@section('styling')
    <style>
        .container{max-width:100%; margin:auto;}
        img{ max-width:100%;}
        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%; border-right:1px solid #c4c4c4;
        }
        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }
        .top_spac{ margin: 20px 0 0;}


        .recent_heading {float: left; width:40%;}
        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%; padding:
        }
        .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }
        .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }
        .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

        .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
        .chat_ib h5 span{ font-size:13px; float:right;}
        .chat_ib p{ font-size:14px; color:#989898; margin:auto}
        .chat_img {
            float: left;
            width: 11%;
        }
        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people{ overflow:hidden; clear:both;}
        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }
        .inbox_chat { height: 550px; overflow-y: scroll;}

        .active_chat{ background:#ebebeb;}

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }
        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }
        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }
        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 3px 0 6px 0px;
        }
        .received_withd_msg { width: 57%;}
        .mesgs {
            float: left;
            padding: 1px 15px 0 25px;
            width: 100%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0; color:#fff;
            padding: 5px 10px 5px 12px;
            width:100%;
        }
        .outgoing_msg{ overflow:hidden; margin:0px 0px 2px 0px;}
        .sent_msg {
            float: right;
            width: 46%;
        }
        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }
        .messaging { padding: 0 0 50px 0;}
        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
        #load_more_span {
            display: block;
            background-color: rgb(235, 235, 235,0.3);
            text-align: center;

        }
        #load_more
        {
            display: inline;
            text-align: center;
            color: rgba(119, 45, 45, 0.9);
            font-weight: bolder;
            margin-top: 0px;
            cursor: pointer;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@stop



@section('mainbody')

    <div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
               
                <span id="load_more_span"><p id="load_more">Load More Messages</p></span>

                <div class="mesgs" >
                    <div class="msg_history" id="chat-window">

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <span id="typingStatus"></span>
                            <input type="text" class="write_msg" placeholder="Type a message" id="msg" />
                            <button class="msg_send_btn" type="button" id="sendButton"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>



        </div></div>
@stop
@section('footerScripts')
    <script>
        $numberofchatmessageretrivenumber = 19;
        $("#load_more").on('click',function(){

            retrieveChatMessages($numberofchatmessageretrivenumber);
            $numberofchatmessageretrivenumber += 10;
        });

        var username = "{{\Illuminate\Support\Facades\Auth::id()}}";
        $(document).ready(function () {
            $('#sendButton').on('click',function () {
                sendMessage();
            })

            $("#msg").keyup(function(e) {
                if (e.keyCode == 13)
                {
                    sendMessage();
                }
                else
                    isTyping();

            });
        })

        function sendMessage() {

            var dt = new Date();
            var time = dt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })
            var month = dt.toLocaleString("en-us", {month: "long"});
            var date = dt.getDate() + " " + month;
            var msg = $('#msg').val();
            $('#msg').val('');
            if(msg != "")
            {

                $('#chat-window').append('<div class="outgoing_msg"> <div class="sent_msg"> <p>'+msg+'</p> <span class="time_date pull-right"> '+date+'    |    '+time+'</span> </div> </div>');
            }
            var messageBody = document.querySelector('#chat-window');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('sendmessage')}}",
                    data: {id1:username,id2:{{$id}},message:msg,},
                    success: function (data) {
                        notTyping();
                        console.log(data);
                    },
        });
        }

        function notTyping()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('usernottyping')}}",
                data: {id1:username,id2:{{$id}}},
                success: function (data) {
                    console.log(data);
                }
            });
        }
        function isTyping()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('usertyping')}}",
                data: {id1:username,id2:{{$id}}},
                success: function (data) {
                },

            });
        }


        pullData();

        function retrieveTypingStatus()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('readuserstauts')}}",
                data: {id1:username,id2:{{$id}}},
                success: function (data) {
                    if (data.length > 0)
                        $('#typingStatus').html(data+' is typing');
                    else
                        $('#typingStatus').html('');
                },

            });
        }

        function retrieveChatMessages(numberofmessages)
        {
            let profile_img = "{{asset('Images/profile')}}/{{\App\User::find($id)->profile_img}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('readusermessage')}}",
                data: {id1:username,id2:{{$id}},numberofmessages:numberofmessages},
                success: function (data) {
                    console.log("Data is This " + data);
                    if(data[4]==0)
                    {
                        $('#load_more_span').css('display','none');
                    }
                    $('#chat-window').empty();
                    if (data.length > 0)
                    {
                        for(var i =0;i<data[0].length;i++)
                        {
                            if(username == data[1][i])
                            {
                                // '+time+'    |    '+date+'
                                $('#chat-window').append('<div class="outgoing_msg"> <div class="sent_msg"> <p>'+data[0][i]+'</p> <span class="time_date pull-right">'+data[2][i]+' | '+data[3][i]+'</span> </div> </div>');
                            }
                            else
                            {
                                $('#chat-window').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="'+profile_img+'" alt="imgage"> </div><div class="received_msg"> <div class="received_withd_msg"> <p>'+data[0][i]+'</p> <span class="time_date">'+data[2][i]+' | '+data[3][i]+'</span></div> </div> </div>');
                            }

                        }
                    }
                },
            });
        }
        function retrieveUnSeenChatMessages()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('readunseenmessage')}}",
                data: {id1:username,id2:{{$id}}},
                success: function (data) {

                    console.log(data);
                    if (data.length > 0)
                    {
                        for(var i =0;i<data[0].length;i++)
                        {
                            if(username == data[1][i])
                            {
                                // '+time+'    |    '+date+'
                                $('#chat-window').append('<div class="outgoing_msg"> <div class="sent_msg"> <p>'+data[0][i]+'</p> <span class="time_date pull-right">'+data[1][i]+' | '+data[2][i]+'</span> </div> </div>');
                            }
                            else
                            {
                                $('#chat-window').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"> <div class="received_withd_msg"> <p>'+data[0][i]+'</p> <span class="time_date">'+data[1][i]+' | '+data[2][i]+'</span></div> </div> </div>');
                            }

                        }
                        var messageBody = document.querySelector('#chat-window');
                        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                    }
                },
            });
        }
        retrieveChatMessages(9);

        function pullData()
        {
            retrieveUnSeenChatMessages();
            retrieveTypingStatus();
            setTimeout(pullData,3000);
console.log("This is in Pull Data");
        }

    </script>
@stop