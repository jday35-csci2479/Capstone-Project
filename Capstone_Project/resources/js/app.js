import './bootstrap';

import Alpine from 'alpinejs';
import '@tailwindplus/elements';
import '@fortawesome/fontawesome-free/css/all.css';

// Forum Reactions Component
window.forumReactions = ({ forumId, initialLikes = 0, initialDislikes = 0, initialType = null }) => ({
    likes: initialLikes,
    dislikes: initialDislikes,
    type: initialType,

    async react(type) {
        try {
            await fetch(`/forums/${forumId}/react`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ type }),
            });

            const isUndo = this.type === type;

            // Reset previous reaction
            if (this.type === 'like') this.likes--;
            if (this.type === 'dislike') this.dislikes--;

            // Apply new reaction if not undo
            if (!isUndo) {
                if (type === 'like') this.likes++;
                if (type === 'dislike') this.dislikes++;
            }

            this.type = isUndo ? null : type;

        } catch (e) {
            console.error(e);
        }
    }
});


window.Alpine = Alpine;

Alpine.start();
