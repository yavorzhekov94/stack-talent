<x-layout>
    <form method="POST" action="{{ route('auth.google.complete-registration') }}">
        @csrf
        <label>Избери тип потребител:</label><br>
        <input type="radio" name="user_type" value="employee" required> Служител<br>
        <input type="radio" name="user_type" value="employer" required> Работодател<br>

        <button type="submit">Завърши регистрацията</button>
    </form>
</x-layout>
