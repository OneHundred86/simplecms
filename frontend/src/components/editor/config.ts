import { uploadVideo } from './upload-video-adaptor-plugin';
import { uploadImage } from './upload-adaptor-plugin';

export const CKEditorConfig = {
    videoUpload: uploadVideo,
    imageUpload: uploadImage,
    mediaEmbed: {
        extraProviders: [
            {
                name: 'embed-media',
                url: [/(.*?)/],
                html: (match) => {
                    const src = match.input;
                    return (
                        '<div style="position: relative; padding-bottom: 100%; height: 0; pointer-events: auto;">' +
                        '<video controls style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" src="' +
                        src +
                        '">' +
                        '</video>' +
                        '</div>'
                    );
                },
            },
        ],
    },
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            'underline',
            'fontBackgroundColor',
            'fontColor',
            'fontSize',
            'fontFamily',
            'link',
            'insertTable',
            'imageUpload',
            'mediaEmbed',
            // 'CKFinder',
            'bulletedList',
            'numberedList',
            'removeFormat',
            '|',
            'alignment',
            'indent',
            'outdent',
            '|',
            'blockQuote',
            'undo',
            'redo',
            'code',
            'codeBlock',
            'highlight',
            'exportPdf',
            'specialCharacters',
            'horizontalLine',
            'MathType',
            'ChemType',
            'strikethrough',
            'subscript',
            'superscript',
            'todoList',
            'restrictedEditingException',
        ]
    },
};