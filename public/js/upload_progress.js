var file_element = document.getElementById('videos');
var progress_bar = document.getElementById('progress_bar');
var progress_bar_process = document.getElementById('progress_bar_process');

file_element.onchange = function() {
    var form_data = new FormData();
    form_data.append('sample_image', file_element.files[0]);
    form_data.append('_token', document.getElementsByName('_token')[0].value);
    progress_bar.style.display = 'block';
    var ajax_request = new XMLHttpRequest();
    ajax_request.open("POST", "{{ route('patients.create') }}");
    ajax_request.upload.addEventListener('progress', function(event) {
        var percent_completed = Math.round((event.loaded / event.total) * 100);
        progress_bar_process.style.width = percent_completed + '%';
        progress_bar_process.innerHTML = percent_completed + '% completed';
    });
    ajax_request.send(form_data);
};
