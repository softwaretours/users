# User interface

Koristi model App\User.

### Upotreba
User Interfejs se poziva iz:

1. App\Http\Controllers\Auth\AuthController metoda create  (kreira novog usera poslije validne registracije)
2. Modules\Core\Http\Controllers\Users\UserController metoda store i update (kreira ili azurira novog usera)


## Bican user roles package
URL: https://github.com/romanbican/roles

Koristi defaultni laravel auth i user tabelu.

#### Database

* Roles
* Permissions
* RolesHasPermisions
* UserRole
* PermisionUser (not used) - za pojedinog korisnika neke permisije

#### Permision slug

1. Prvi dio naziva je puni naziv rute
2. Zadnji dio naziva dodajemo interfejs akciju npr. view, edit, delete. 
3. Ukoliko je zadnji dio naziva route, onda oznacava pristup cjeloj ruti.


### User roles

1. Software Tours / slug: st, level: 100 (Software tours sve privilegije)

2. Super administrator / slug: super.admin, level: 90 (Super administrator sve privilegije osim finansiskih izvještaja)

3. Reseller / slug: reseller, level: 80 (Reseller | Kreira svoje kliejnte kao Software tours | uvid u svoje finansiske izvještaje)

4. Klijent / slug: client, level: 70 (Turistička agencija | Hotel | Cms | E-commerce)

5. Zaposleni / slug: client.employee, level: 60 (Zaposleni od klijenta| Isto kao i klijent, nema uvid u finansiske izvještaje)

6. Partner / slug: partner.employee, level: 50 (Zaposleni od klijentovog partnera | Isto kao i partner, nema uvid u finansiske izvještaje)

7. Dobavljač / slug: client.supplier, level: 40 (Ažurira svoje produckte i pregleda koliku zaradu ima preko klijenta)

8. Affiliate / slug: client.affiliate, level: 30 (Affiliate | Pregleda koliko je prodaje došlo preko njegovog računa i kolika mu je zarada)


