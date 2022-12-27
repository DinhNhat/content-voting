
document.addEventListener("click", function(event) {

    const isInsideIdeaContainer = event.srcElement.closest('.idea-container');

    if (isInsideIdeaContainer == null) {
        // You click OUTSIDE the idea container
        //  This click is not inside the spam dialog so check the dialog state of visibility
        const spamDialogs = document.getElementsByClassName("spam-dialog");
        for (let i = 0; i < spamDialogs.length; i++) {
            const hasHiddenClass = spamDialogs[i].classList.contains("hidden");
            if (!hasHiddenClass) { // if any dialog is visible then hide it
                spamDialogs[i].classList.add("hidden");
            }
        }
    } else {
        // You click INSIDE the idea container, then check if the element is the button toggle spam dialog
        const isInsideSpamDialogBtn = event.srcElement.closest('.toggle-spam');

        if (isInsideSpamDialogBtn == null) {
            // You DON'T click the spam dialog button then navigate to the show idea page
            const ideaLink = event.srcElement.closest('.idea-container').querySelector('.idea-link');
            ideaLink.click();
        }
    }
});

// Function to toggle the spam dialog when click event occurred
function toggleSpamDialog(event) {
    event.querySelector('.spam-dialog').classList.toggle("hidden");
}

function toggleReplyForm(event) {
    event.querySelector('.reply-form').classList.toggle("hidden");
}

function toggleSetStatusForm(event) {
    event.querySelector('.set-status-form').classList.toggle("hidden");
}

// function clickableIdeaContainer(event) {
//     // when the whole idea container is clicked then navigate to the relevant idea show page
//     console.log(event.target);
//     return;
//
//     const ignores = ['button','svg','path','a', 'img'];
//     const ideaLink = event.closest('.idea-container').querySelector('.idea-link');
//     ideaLink.click();
// }

