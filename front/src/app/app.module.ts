import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";

import { AppRoutingModule } from "./app-routing.module";
import { AppComponent } from "./app.component";
import { SharedModule } from "./modules/shared/shared.module";

const components = [AppComponent];
const modules = [BrowserModule, AppRoutingModule, SharedModule];

@NgModule({
  declarations: [...components],
  imports: [...modules],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}
