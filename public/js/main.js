
document.addEventListener("click", function(event) {

    /**
     * Handle idea container clickable
     */
    handleIdeaContainerClickable(event);

    /**
     * Handle reply and set-status popup's visible
     */
    handlePostCommentAndStatusFormsVisibility(event);

});

// Function to toggle the spam dialog when click event occurred
function toggleSpamDialog(event) {
    event.querySelector('.spam-dialog').classList.toggle("hidden");
}


function togglePostCommentForm() {
    const postCommentForm = document.querySelector("#post-comment-form");
    postCommentForm.classList.toggle("hidden");
}

function toggleSetStatusForm() {
    const postCommentFormElement = document.getElementById("set-status-form");
    postCommentFormElement.classList.toggle("hidden");
}

function handleIdeaContainerClickable(event) {
    const isInsideIdeaContainer = event.srcElement.closest('.idea-container');
    if (isInsideIdeaContainer == null) {
        // You click OUTSIDE the idea container
        //  This click is not inside the spam dialog so check the dialog state of visibility
        closeOpeningSpamDialog();
    } else {
        // You click INSIDE the idea container, then check if the element is the button toggle spam dialog
        const isInsideSpamDialogBtn = event.srcElement.closest('.toggle-spam');
        if (isInsideSpamDialogBtn == null) {
            // You DON'T click the spam dialog button
            const isTheAvatarImgClicked = event.srcElement.closest('.avatar-img');
            if (isTheAvatarImgClicked == null) {
                // The avatar image is NOT clicked then navigate the the idea show page
                navigateToIdeaShowPage(event);
            }
        }
    }
}

function handlePostCommentAndStatusFormsVisibility(event) {
    const isInsidePostCommentSection = event.srcElement.closest('#post-comment-section');
    const isInsideSetStatusSection = event.srcElement.closest('#set-status-section');

    if (isInsidePostCommentSection == null) {
        // You click OUTSIDE the post comment section
        //  if the post comment form is open then close it
        const postCommentFormElement = document.getElementById("post-comment-form");
        const hasHiddenClass = postCommentFormElement.classList.contains("hidden");
        if (!hasHiddenClass) {
            postCommentFormElement.classList.add("hidden");
        }
    }

    if (isInsideSetStatusSection == null) {
        // You click OUTSIDE the set status section
        //  if the set status form is open then close it
        const setStatusFormElement = document.getElementById("set-status-form");
        const hasHiddenClass = setStatusFormElement.classList.contains("hidden");
        if (!hasHiddenClass) {
            setStatusFormElement.classList.add("hidden");
        }
    }
}

function closeOpeningSpamDialog() {
    const spamDialogs = document.getElementsByClassName("spam-dialog");
    for (let i = 0; i < spamDialogs.length; i++) {
        const hasHiddenClass = spamDialogs[i].classList.contains("hidden");
        if (!hasHiddenClass) { // if any dialog is visible then hide it
            spamDialogs[i].classList.add("hidden");
        }
    }
}

function navigateToIdeaShowPage(event) {
    const ideaLink = event.srcElement.closest('.idea-container').querySelector('.idea-link');
    ideaLink.click();
}

