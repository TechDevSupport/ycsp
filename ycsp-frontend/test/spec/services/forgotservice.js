'use strict';

describe('Service: forgotService', function () {

  // load the service's module
  beforeEach(module('ycspApp'));

  // instantiate service
  var forgotService;
  beforeEach(inject(function (_forgotService_) {
    forgotService = _forgotService_;
  }));

  it('should do something', function () {
    expect(!!forgotService).toBe(true);
  });

});
