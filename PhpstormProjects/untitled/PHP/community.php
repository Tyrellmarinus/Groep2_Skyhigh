
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sky High - Community</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <header class="header-bar">
        <div class="top-right">
            <a href="inloggen.php" class="small-link">Inloggen</a>
            <a href="registreren.php" class="small-link">Registreren</a>
        </div>
        <div class="header-right">
            <nav>
                <a href="../index.php" class="nav-link active">Home</a>
                <a href="fotos.php" class="nav-link">Fotos</a>
                <a href="community.php" class="nav-link">Community</a>
                <a href="reserveren.php" class="nav-link">Reserveren</a>
                <a href="contact.php" class="nav-link">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="banner">
            <a href="../index.php" class="logo-link">
                <img src="../img/Logo.jpg.png" alt="SkyHighLogo" class="logo-image">
            </a>
        </div>

        <div class="island">
            <?php
            // Place your PHP code here
            echo "<h1>Community</h1>";
            echo "<p>Welcome to the community page.</p>";
            ?>
        </div>
    </main>

    <footer class="footer-bar">
        <p class="footer-text">Skyhigh, &copy; 2023</p>
    </footer>
</div>
</body>
</html>   ---!>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sky High - Community</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Custom styles for the community page */
        .post-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .post {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .post-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .username {
            font-weight: bold;
        }

        .timestamp {
            margin-left: auto;
            color: #888;
        }

        .post-text {
            margin-bottom: 10px;
        }

        .post-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .post-upload {
            margin-bottom: 20px;
        }

        .post-upload input[type="file"] {
            display: none;
        }

        .post-upload label {
            background-color: #ddd;
            padding: 10px 20px;
            cursor: pointer;
        }

        .post-message {
            margin-bottom: 10px;
        }

        .post-buttons {
            display: flex;
        }

        .post-buttons button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="header-bar">
        <div class="top-right">
            <a href="inloggen.php" class="small-link">Inloggen</a>
            <a href="registreren.php" class="small-link">Registreren</a>
        </div>
        <div class="header-right">
            <nav>
                <a href="../index.php" class="nav-link active">Home</a>
                <a href="fotos.php" class="nav-link">Fotos</a>
                <a href="community.php" class="nav-link">Community</a>
                <a href="reserveren.php" class="nav-link">Reserveren</a>
                <a href="contact.php" class="nav-link">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="banner">
            <a href="../index.php" class="logo-link">
                <img src="../img/Logo.jpg.png" alt="SkyHighLogo" class="logo-image">
            </a>
        </div>

        <div class="post-container">
            <div class="post-upload">
                <input type="file" id="imageUpload">
                <label for="imageUpload">Upload a photo</label>
            </div>

            <div class="post-message">
                <textarea id="postMessage" rows="3" placeholder="Write your message..."></textarea>
            </div>

            <div class="post-buttons">
                <button id="postButton" onclick="createPost()">Post</button>
                <button id="commentButton" onclick="createComment()">Comment</button>
            </div>

            <div id="postsContainer"></div>
        </div>
    </main>

    <footer class="footer-bar">
        <p class="footer-text">Skyhigh, &copy; 2023</p>
    </footer>
</div>

<script>
    // JavaScript code
    document.getElementById("imageUpload").addEventListener("change", function (event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            var postImage = document.createElement("img");
            postImage.classList.add("post-image");
            postImage.src = e.target.result;

            var post = document.createElement("div");
            post.classList.add("post");

            var postInfo = document.createElement("div");
            postInfo.classList.add("post-info");

            var profilePicture = document.createElement("img");
            profilePicture.classList.add("profile-picture");
            profilePicture.src = "profile_picture.jpg"; // Replace with the actual profile picture URL
            postInfo.appendChild(profilePicture);

            var username = document.createElement("span");
            username.classList.add("username");
            username.textContent = "JohnDoe"; // Replace with the actual username
            postInfo.appendChild(username);

            var timestamp = document.createElement("span");
            timestamp.classList.add("timestamp");
            timestamp.textContent = new Date().toLocaleString(); // Replace with the actual timestamp
            postInfo.appendChild(timestamp);

            post.appendChild(postInfo);

            var postText = document.createElement("div");
            postText.classList.add("post-text");
            postText.textContent = document.getElementById("postMessage").value; // Get the post message from the input field
            post.appendChild(postText);

            post.appendChild(postImage);

            var postsContainer = document.getElementById("postsContainer");
            postsContainer.insertBefore(post, postsContainer.firstChild);

            // Reset input fields
            document.getElementById("imageUpload").value = null;
            document.getElementById("postMessage").value = null;
        };

        reader.readAsDataURL(file);
    });

    function createPost() {
        var postMessage = document.getElementById("postMessage").value;

        if (postMessage.trim() === "") {
            alert("Please enter a message.");
            return;
        }

        var post = document.createElement("div");
        post.classList.add("post");

        var postInfo = document.createElement("div");
        postInfo.classList.add("post-info");

        var profilePicture = document.createElement("img");
        profilePicture.classList.add("profile-picture");
        profilePicture.src = "profile_picture.jpg"; // Replace with the actual profile picture URL
        postInfo.appendChild(profilePicture);

        var username = document.createElement("span");
        username.classList.add("username");
        username.textContent = "JohnDoe"; // Replace with the actual username
        postInfo.appendChild(username);

        var timestamp = document.createElement("span");
        timestamp.classList.add("timestamp");
        timestamp.textContent = new Date().toLocaleString(); // Replace with the actual timestamp
        postInfo.appendChild(timestamp);

        post.appendChild(postInfo);

        var postText = document.createElement("div");
        postText.classList.add("post-text");
        postText.textContent = postMessage;
        post.appendChild(postText);

        var postsContainer = document.getElementById("postsContainer");
        postsContainer.insertBefore(post, postsContainer.firstChild);

        // Reset input fields
        document.getElementById("postMessage").value = null;
    }

    function createComment() {
        var postMessage = document.getElementById("postMessage").value;

        if (postMessage.trim() === "") {
            alert("Please enter a comment.");
            return;
        }

        var comment = document.createElement("div");
        comment.classList.add("comment");

        var commentText = document.createElement("div");
        commentText.classList.add("comment-text");
        commentText.textContent = postMessage;
        comment.appendChild(commentText);

        var commentsContainer = document.getElementById("commentsContainer");
        commentsContainer.appendChild(comment);

        // Reset input field
        document.getElementById("postMessage").value = null;
    }
</script>

</body>
</html>




<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sky High - Community</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .chat-container {
            max-width: 600px;
            margin: 0 auto;
            margin-bottom: 50px;
        }

        .message {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .message .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .message .user-info img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .message .user-info .username {
            font-weight: bold;
        }

        .post-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .post-form textarea {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
            margin-bottom: 10px;
        }

        .post-form .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .post-form .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .post-form .upload-btn-wrapper .btn {
            border: none;
            outline: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 10px;
        }

        .post-form .post-button {
            border: none;
            outline: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <header class="header-bar">
        <!-- Header content -->
    </header>

    <main>
        <div class="banner">
            <!-- Banner content -->
        </div>

        <div class="chat-container">
            <div id="chatContainer"></div>

            <div class="post-form">
                <textarea id="postMessage" placeholder="Write your message..."></textarea>
                <div class="upload-btn-wrapper">
                    <button class="btn"><i class="fas fa-paperclip"></i> Upload Picture</button>
                    <input type="file" id="imageInput">
                </div>
                <button class="post-button" onclick="createPost()">Post</button>
            </div>
        </div>
    </main>

    <footer class="footer-bar">
        <p class="footer-text">Skyhigh, &copy; 2023</p>
    </footer>
</div>

<script>
    function createPost() {
        var postMessage = document.getElementById("postMessage").value;
        var fileInput = document.getElementById("imageInput");
        var file = fileInput.files[0];

        if (postMessage.trim() === "" && !file) {
            alert("Please enter a comment or select an image to upload.");
            return;
        }

        var postContainer = document.createElement("div");
        postContainer.classList.add("message", "post-container");

        var userInfo = document.createElement("div");
        userInfo.classList.add("user-info");
        var userProfilePic = document.createElement("img");
        userProfilePic.src = "pf.jpg.png"; // Replace with the actual profile picture URL
        var username = document.createElement("span");
        username.classList.add("username");
        username.textContent = "voorbeeld"; // Replace with the actual username
        userInfo.appendChild(userProfilePic);
        userInfo.appendChild(username);
        postContainer.appendChild(userInfo);

        var message = document.createElement("div");
        message.classList.add("message", "comment");
        message.textContent = postMessage;
        postContainer.appendChild(message);

        if (file) {
            var image = document.createElement("img");
            image.classList.add("message", "image");
            image.src = URL.createObjectURL(file);
            postContainer.appendChild(image);
        }

        var chatContainer = document.getElementById("chatContainer");
        chatContainer.appendChild(postContainer);

        // Reset input fields
        document.getElementById("postMessage").value = "";
        fileInput.value = "";
    }
</script>

</body>
</html>

---!>
