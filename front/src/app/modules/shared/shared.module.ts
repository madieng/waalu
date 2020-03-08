import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { HeaderComponent } from "./components/header/header.component";
import { FooterComponent } from "./components/footer/footer.component";

const modules = [CommonModule];
const components = [HeaderComponent, FooterComponent];

@NgModule({
  declarations: [...components],
  imports: [...modules],
  exports: [...components]
})
export class SharedModule {}
