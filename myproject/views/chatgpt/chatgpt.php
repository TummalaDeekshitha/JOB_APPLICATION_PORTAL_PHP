<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with ChatGPT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(-60deg, #ff5858 0%, #f09819 100%);
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .chat-container {
            max-width: 700px;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Added */
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .message-container {
            height: 350px;
            overflow-y: scroll;
            padding: 10px;
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 10px;
            overflow: auto;
        }
        .sent .message-bubble {
            background-color: #e2f9ff;
            color: #333;
            border-radius: 15px;
            padding: 10px 15px;
            max-width: 70%;
            word-wrap: break-word;
            float: right;
        }
        .received .message-bubble {
            background-color: #337ab7;
            color: #fff;
            border-radius: 15px;
            padding: 10px 15px;
            max-width: 70%;
            word-wrap: break-word;
            float: left;
        }
        .input-group {
            margin-top: 20px;
        }
        .btn-primary {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            background-color: #337ab7;
            border-color: #337ab7;
        }
        .btn-primary:hover {
            background-color: #2e6da4;
            border-color: #2e6da4;
        }
        .form-control {
            border-radius: 20px;
        }
        .chat-image {
            flex: 1;
            padding-right: 20px;
        }
        .chat-image img {
            width: 100%;
            border-radius: 10px;
        }
        .end-chat-btn {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="chat-container">
            
            <div class="row">
                
               
                <div >
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="chat-tab" data-bs-toggle="tab" data-bs-target="#chat" type="button" role="tab" aria-controls="chat" aria-selected="true">Ask your queries</button>
                            <a type="button" class="close-btn btn btn-danger" href="/myproject/about">close</a> <!-- Close button added -->
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                            <div class="message-container" id="messageContainer">
                                <!-- Messages will be inserted here -->
                            </div>
                            <div class="input-group">
                                <input type="text" id="messageInput" class="form-control" placeholder="Type your message...">
                                <button class="btn btn-primary" onclick="sendMessage()">Send</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <!-- Info content -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let conversation = "";

    function sendMessage() {
        var message = document.getElementById('messageInput').value;
        if (message.trim() === '') {
            return;
        }
        conversation += "user: " + message + "<br>";

        // Clear input field
        document.getElementById('messageInput').value = '';

        // Add the sent message to the message container on the right side
        var messageContainer = document.getElementById('messageContainer');
        var messageDiv = document.createElement('div');
        messageDiv.classList.add('message', 'sent');
        var messageBubble = document.createElement('div');
        messageBubble.classList.add('message-bubble');
        messageBubble.innerHTML = message;
        messageDiv.appendChild(messageBubble);
        messageContainer.appendChild(messageDiv);

        // Scroll to bottom
        messageContainer.scrollTop = messageContainer.scrollHeight;

        // Send message via AJAX
        $.ajax({
            type: "POST",
            url: "/myproject/chatgpt/message",
            data: { message: conversation },
            success: function(response) {
                // Add the received message to the message container on the left side
                var receivedMessageDiv = document.createElement('div');
                receivedMessageDiv.classList.add('message', 'received');
                var receivedMessageBubble = document.createElement('div');
                receivedMessageBubble.classList.add('message-bubble');
                receivedMessageBubble.innerHTML = response;
                receivedMessageDiv.appendChild(receivedMessageBubble);
                messageContainer.appendChild(receivedMessageDiv);

                // Scroll to bottom
                messageContainer.scrollTop = messageContainer.scrollHeight;
                conversation += "AI: " + response + "<br>";
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function endChat() {
        // Add your logic to end the chat
        alert("Chat ended!");
    }

    function closeChat() {
        // Add your logic to close the chat container
        alert("Chat closed!");
    }
</script>
</body
