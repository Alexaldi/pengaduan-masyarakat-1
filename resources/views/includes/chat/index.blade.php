@extends('layouts.masyarakat')

@section('chat')
<div class="w-full h-screen bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200 transition duration-100 ease-in-out">
    <div class="flex flex-col h-full px-6 py-6">
        <h3 class="text-2xl font-semibold text-center mb-4">
            <i class="bi bi-headset text-gray-700 dark:text-gray-200"></i> Admin
        </h3>

        <!-- Chat Box -->
        <div id="chat-box"
            class="flex-1 overflow-y-auto border border-gray-300 dark:border-gray-700 rounded-lg p-4 bg-gray-50 dark:bg-gray-800 space-y-2 shadow-inner scroll-smooth">
        </div>

        <!-- Chat Form -->
        <form id="chat-form" class="mt-4 flex gap-2 mb-6">
            @csrf
            <input type="text" name="message" id="message-input"
                class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
                placeholder="Ketik pesan..." required>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all ml-3">Kirim</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const userId = "{{ auth()->check() ? auth()->id() : request('user_id') }}";
    const petugasId = "{{ auth('petugas')->check() ? auth('petugas')->id() : request('petugas_id') }}";

    const senderType = "{{ auth('petugas')->check() ? 'petugas' : 'user' }}";
    const receiverId = senderType === 'petugas' ? userId : petugasId;

    function loadChat() {
        fetch(`/chat/history/${userId}/${petugasId}`)
            .then(res => res.json())
            .then(messages => {
                const box = document.getElementById('chat-box');
                box.innerHTML = '';
                messages.forEach(msg => {
                    const isMine = (senderType === 'user' && msg.sender_type === 'App\\Models\\User') ||
                                   (senderType === 'petugas' && msg.sender_type === 'App\\Models\\Petugas');

                    const bubble = document.createElement('div');
                    bubble.classList.add('w-full', 'flex', isMine ? 'justify-end' : 'justify-start');

                    const bubbleInner = document.createElement('div');
                    bubbleInner.className = `max-w-xs px-4 py-2 rounded-lg shadow text-white text-sm ${
                        isMine ? 'bg-green-600' : 'bg-gray-500'
                    }`;
                    bubbleInner.innerText = msg.message;

                    bubble.appendChild(bubbleInner);
                    box.appendChild(bubble);
                });
                box.scrollTop = box.scrollHeight;
            });
    }

    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const input = document.getElementById('message-input');
        const message = input.value.trim();

        if (message === '') return;

        const url = senderType === 'petugas'
            ? `/chat/send/user/${userId}`
            : `/chat/send/petugas/${petugasId}`;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
            },
            body: JSON.stringify({ message })
        })
        .then(res => res.json())
        .then(res => {
            if (res.status === 'success') {
                input.value = '';
                loadChat();
            }
        });
    });

    loadChat();
    setInterval(loadChat, 5000);
</script>
@endpush
