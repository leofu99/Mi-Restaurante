import { Component } from '@angular/core';
import { Plato } from './models/plato';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  platoArray: Plato[] = [
  {id:1, nombre:"Cabro", descripcion:"Cabro con pepitoria acompañado con ensalada yuca y arepa"},
  {id:2, nombre:"Pollo a la brasa", descripcion:"Piernapernil de pollo asado a la brasa"},
  {id:3,nombre:'Mojarra', descripcion:"Mojarra frita"}
  ]

  selectedPlato: Plato = new Plato();

  addOrEdit(){
    if(this.selectedPlato.id === 0)
    {
    this.selectedPlato.id = this.platoArray.length+1;
    this.platoArray.push(this.selectedPlato);
    }

    this.selectedPlato = new Plato();
  }

  openForEdit(plato:Plato){
    this.selectedPlato = plato;
  }

  delete(){
    if(confirm('seguro que quieres eliminar este plato?')){
      this.platoArray = this.platoArray.filter(x => x!= this.selectedPlato);
      this.selectedPlato = new Plato(); 
    }
     
  }

}
