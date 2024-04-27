<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    <div class = "studentListItem">
        <div>This is student # {{ $student->id }}</div>
        <div>Stoudents group name: {{ $student->group_id }}</div>
        <div>Students surname: {{ $student->surname }}</div>
        <div>Students name: {{ $student->name }}</div>
        <div class = "studentCreate">Creation date: {{date('j F Y',strtotime($student->created_at)) }} </div>
        <div class = "studentUpdate">Update date: {{date('j F Y',strtotime($student->updated_at)) }}</div>
    </div>

 
</div>

