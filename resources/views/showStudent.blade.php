<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
   
    @foreach ($student as $gr)
                        <li class = "groupListItem">
                        <p>{{$gr->id}}</p>
                        </li>
                        @endforeach
</div>

