@include('adminLte.templateTop')

<div class="container">
    <div class="card card-primary justify-content-md-center">
        <div class="card-header">
            <h3 class="card-title">Dodaj nowy rodzaj karnetu</h3>
        </div>
        <form action="addMemberships" method="POST">
           @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nazwa karnetu: </label>
                    <input type="text" name="nazwa_karnetu" class="form-control" id="nazwa_karnetu"  required placeholder="Wprowadź nazwe karnetu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cena: </label>
                    <input type="number" name="cena" class="form-control" id="cena" required placeholder="Wprowadź cena w PLN">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Na ile dni ważny:</label>
                    <input type="number"  name="dni_karnetu" class="form-control" id="dni_karnetu" required placeholder="Wprowadź na ile wazny bedzie karnet">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Dodaj karnet</button>
            </div>
        </form>
    </div>
</div>
@include('adminLte.templateBottom')
