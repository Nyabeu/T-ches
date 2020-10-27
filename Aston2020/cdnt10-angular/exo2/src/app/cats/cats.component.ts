import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cats',
  templateUrl: './cats.component.html',
  styleUrls: ['./cats.component.scss']
})
export class CatsComponent implements OnInit {

  listeCats:string = "Listes des chats";

  cats = [
    { nom : "mian", 
      couleur:"blanc", 
      age : "1"
    },
    { nom : "niton", 
      couleur:"noir", 
      age : "2"
    },
    { nom : "catch", 
      couleur:"marron", 
      age : "3"
    },
    { nom : "milou", 
      couleur:"belge", 
      age : "4"
    }
  ];

  constructor() { }

  ngOnInit(): void {
  }

  myStyles : {
    fontSize : '30px';
  }

  onclick(chat: string): void{
    alert(`Le chat ${chat} a été envoyé !!!`);
  }

}
