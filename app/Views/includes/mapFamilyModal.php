<div id="familyModal" class="pin__modal">
  <form id="formData" class="form__data">
    <div class="heading__box">
        <h3 class="modal__heading">Register a House</h3>
        <ion-icon class="icon__close" name="close-outline"></ion-icon>
    </div>
    <div class="input__group">
      <div class="select__container pos__rel">
        <select class="select__input information__input" name="type">
          <option disabled selected>Select one</option>
          <option value="residential">Residential</option>
          <option value="government">Government Building</option>
          <option value="commercial">Commercial Establishment</option>
          <option value="healthcare">Healthcare Facility</option>
          <option value="education">Educational Institution</option>
          <option value="transport">Transport Hub</option>
      </select>
      <div class="select__chev__down pos__abs">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"></path></svg>
      </div>
      </div>
      <input class="information__input" type="text" id="houseNumberInput" placeholder="Input House Number">
      <input class="information__input" type="text" name="house_street" placeholder="Input Street">
      <input class="information__input" type="hidden" id="latInput">
      <input class="information__input" type="hidden" id="lngInput">
    </div>
    <div class="btn__box">
      <button class="btn btn__save__services" type="button" id="saveHouseNumber">Save</button>
      <button class="btn btn__cancel__services" type="button" id="closeModalServices">Cancel</button>
      </div>
  <form>
</div>