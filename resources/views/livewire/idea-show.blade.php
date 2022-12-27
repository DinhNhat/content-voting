<div class="idea-and-buttons container">

    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2 md:mx-4">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-2 md:mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    {{ $idea->description }}
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 comments</div>
                    </div>
                    <div class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div class="{{ Str::kebab($idea->status->name) }} text-xxs font-bold uppercase
                            leading-none rounded-full text-center w-28 h-7 py-2 px-4"
                        >
                            {{ $idea->status->name }}
                        </div>
                        <button
                            class="toggle-spam relative bg-gray-100 hover:bg-gray-200 border
                            rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                            onClick="toggleSpamDialog(this)"
                        >
                            <svg fill="currentColor" width="24" height="6">
                                <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                            </svg>
                            <ul
                                class="spam-dialog hidden absolute w-44 text-left font-semibold bg-white
                                shadow-dialog rounded-xl z-10 py-3 md:ml-8 top-8 md:top-6 right-0 md:left-0"
                            >
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark As Spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                            </ul>
                        </button>
                    </div>

                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">{{ \Illuminate\Support\Str::plural('Vote', $votesCount) }}</div>
                        </div>

                        @if ($hasVoted)
                            <button wire:click.prevent="vote" class="w-18 h-10 bg-blue border border-blue
                                font-bold text-white text-xxs uppercase rounded-xl hover:blue-hover
                                transition duration-150 ease-in px-4 py-3 -mx-7"
                            >
                                Voted
                            </button>
                        @else
                            <button wire:click.prevent="vote" class="w-18 h-10 bg-gray-200 border border-gray-200
                                font-bold text-xxs uppercase rounded-xl hover:border-gray-400
                                transition duration-150 ease-in px-4 py-3 -mx-7"
                            >
                                Vote
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end idea-container -->

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div class="relative" onClick="toggleReplyForm(this)">
                <button
                    type="button"
                    class="flex items-center justify-center h-11 w-32
                    text-sm text-white bg-blue
                    font-semibold rounded-xl border border-blue
                    hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                >
                    Reply
                </button>

                <div
                    class="reply-form hidden absolute z-10 w-64 md:w-104 text-left font-semibold
                    text-sm bg-white shadow-dialog rounded-xl mt-2"
                >
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment"
                                cols="30" rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2"
                                placeholder="Go ahead, don't be shy. Share your thoughts..."
                            ></textarea>
                        </div>

                        <div class="flex flex-col md:flex-row items-center md:space-x-3">
                            <button
                                type="button"
                                class="flex items-center justify-center h-11 w-full md:w-1/2
                                text-sm text-white bg-blue
                                font-semibold rounded-xl border border-blue
                                hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                Post Comment
                            </button>
                            <button
                                type="button"
                                class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200
                                font-semibold rounded-xl border border-gray-200
                                hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
                            >
                                <svg class="text-gray-600 w-4 -rotate-45" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="relative" onClick="toggleSetStatusForm(this)">
                <button
                    type="button"
                    class="flex items-center justify-center w-36 h-11 text-sm bg-gray-200
                    font-semibold rounded-xl border border-gray-200
                    hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-2 md:mt-0"
                >
                    <span>Set Status</span>
                    <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div
                    class="set-status-form hidden absolute z-20 w-64 md:w-76
                    text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-black border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-purple border-none" name="radio-direct" value="2">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-yellow border-none" name="radio-direct" value="3">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-green border-none" name="radio-direct" value="4">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-red border-none" name="radio-direct" value="5">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>

                        <textarea name="update_comment" id="update_comment" cols="30" rows="3"
                        class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-9000 border-none px-4 py-2"
                        placeholder="Add an update comment (optional)"></textarea>

                        <div class="flex items-center justify-between space-x-3">
                            <button
                                type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200
                                font-semibold rounded-xl border border-gray-200
                                hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                            >
                                <svg class="text-gray-600 w-4 -rotate-45" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                            <button
                                type="submit"
                                class="flex items-center justify-center w-1/2 h-11
                                text-xs text-white bg-blue
                                font-semibold rounded-xl border border-blue
                                hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                <span class="ml-1">Update</span>
                            </button>
                        </div>
                        <div>
                            <label class="font-normal inline-flex items-center">
                              <input class="rounded bg-gray-200" name="notify_voters" type="checkbox" checked="">
                              <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">{{ \Illuminate\Support\Str::plural('Vote', $votesCount) }}</div>
            </div>
            @if ($hasVoted)
                <button wire:click.prevent="vote" class="w-32 h-11 bg-blue border border-blue
                    font-bold text-white text-xxs uppercase rounded-xl hover:blue-hover
                    transition duration-150 ease-in px-4 py-3 -mx-7"
                >
                    Voted
                </button>
            @else
                <button
                    wire:click.prevent="vote"
                    type="button"
                    class="w-32 h-11 text-xs bg-gray-200
                    font-semibold uppercase rounded-xl border border-gray-200
                    hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                >
                    Vote
                </button>
            @endif
        </div>
    </div> <!-- end buttons-container -->

</div> <!-- end ideas and buttons container -->
