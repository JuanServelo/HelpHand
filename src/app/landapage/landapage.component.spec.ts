import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LandapageComponent } from './landapage.component';

describe('LandapageComponent', () => {
  let component: LandapageComponent;
  let fixture: ComponentFixture<LandapageComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [LandapageComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(LandapageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
