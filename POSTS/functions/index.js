const functions = require("firebase-functions");
const admin = require("firebase-admin");

admin.initializeApp({
  projectId: "finals-activity",
});

exports.likepost = functions.https.onRequest(async (req, res) => {
  const firestore = admin.firestore();

  const postId = req.body.postId;
  const userId = req.body.userId;

  if (!postId) {
    res.status(400).send("Post ID not found.");
    return;
  }

  if (!userId) {
    res.status(400).send("User ID not found.");
    return;
  }

  try {
    const postRef = firestore.collection("posts").doc(postId);
    const postDoc = await postRef.get();

    if (postDoc.exists) {
      const postData = postDoc.data();

      const likesByUsers = postData.likes_by_users || [];
      const userLiked = likesByUsers.includes(userId);

      if (userLiked) {
        await postRef.update({
          likes: postData.likes - 1,
          likes_by_users: likesByUsers.filter((id) => id !== userId),
        });
      } else {
        await postRef.update({
          likes: postData.likes + 1,
          likes_by_users: [...likesByUsers, userId],
        });
      }

      res.redirect(303, "/index.php");
    } else {
      res.status(404).send("Post not found.");
    }
  } catch (error) {
    console.error("Error updating post:", error);
    res.status(500).send("Internal server error.");
  }
});

exports.commentCounter = functions.firestore
  .document("post_comments/{postId}")
  .onWrite(async (change, context) => {
    const postId = context.params.postId;
    const commentsSnapshot = await change.after.ref.get();
    const commentsData = commentsSnapshot.data();

    let commentCount = 0;
    if (commentsData && commentsData.comments) {
      commentCount = commentsData.comments.length;
    }
    const firestore = admin.firestore();
    const postRef = firestore.collection("posts").doc(postId);

    try {
      await postRef.update({ commentCount });
      console.log("Comment count updated successfully.");
    } catch (error) {
      console.error("Error updating comment count:", error);
    }
  });
