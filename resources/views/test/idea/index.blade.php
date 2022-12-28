<x-test.master-layout>
    <livewire:ideas-index-test />

    @prepend('page-script')
        <script>
            document.addEventListener("click", function(event) {

                /**
                 * Handle idea container clickable
                 */
                handleIdeaContainerClickable(event);
            });

            // Function to toggle the spam dialog when click event occurred
            function toggleSpamDialog(event) {
                event.querySelector('.spam-dialog').classList.toggle("hidden");
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
        </script>
    @endprepend
</x-test.master-layout>
