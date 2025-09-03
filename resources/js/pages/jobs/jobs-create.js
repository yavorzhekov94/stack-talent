import Tagify from '@yaireo/tagify';
import '@yaireo/tagify/dist/tagify.css';

document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector('input[name="tags_csv"]');
    if (!input) return;

    if (input.value && /^[A-Za-z0-9+/=]+$/.test(input.value)) {
        input.value = '';
    }

    let whitelist = [];
    const script = document.getElementById('tag-suggestions');
    if (script) {
        try { whitelist = JSON.parse(script.textContent || '[]'); }
        catch (e) { console.error('Tag suggestions JSON parse error:', e); }
    }

    new Tagify(input, {
        whitelist,
        dropdown: {
            enabled: 1,
            maxItems: 10,
            closeOnSelect: false,
            fuzzySearch: true
        },

        originalInputValueFormat: valuesArr => valuesArr.map(v => v.value).join(', ')
    });
});
