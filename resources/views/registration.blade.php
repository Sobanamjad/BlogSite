  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>User Registration</title>
      <style>
          * {
              margin: 0;
              padding: 0;
              box-sizing: border-box;
          }

          body {
              font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
              background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
              min-height: 100vh;
              display: flex;
              align-items: center;
              justify-content: center;
              padding: 20px;
          }

          .form-container {
              background: rgba(255, 255, 255, 0.95);
              backdrop-filter: blur(20px);
              border-radius: 24px;
              padding: 40px;
              box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
              border: 1px solid rgba(255, 255, 255, 0.2);
              width: 100%;
              max-width: 480px;
              transform: translateY(20px);
              opacity: 0;
              animation: slideUp 0.8s ease-out forwards;
          }

          @keyframes slideUp {
              to {
                  transform: translateY(0);
                  opacity: 1;
              }
          }

          .form-header {
              text-align: center;
              margin-bottom: 32px;
          }

          .form-header h1 {
              color: #1a202c;
              font-size: 2.5rem;
              font-weight: 700;
              margin-bottom: 8px;
              background: linear-gradient(135deg, #667eea, #764ba2);
              -webkit-background-clip: text;
              -webkit-text-fill-color: transparent;
              background-clip: text;
          }

          .form-header p {
              color: #718096;
              font-size: 1.1rem;
          }

          .form-group {
              margin-bottom: 24px;
              position: relative;
          }

          .form-row {
              display: flex;
              gap: 16px;
          }

          .form-row .form-group {
              flex: 1;
          }

          label {
              display: block;
              font-weight: 600;
              color: #2d3748;
              margin-bottom: 8px;
              font-size: 0.95rem;
              transition: color 0.3s ease;
          }

          input[type="text"],
          input[type="email"],
          input[type="password"],
          input[type="number"],
          select {
              width: 100%;
              padding: 16px;
              border: 2px solid #e2e8f0;
              border-radius: 12px;
              font-size: 1rem;
              background: rgba(255, 255, 255, 0.8);
              transition: all 0.3s ease;
              outline: none;
          }

          input[type="text"]:focus,
          input[type="email"]:focus,
          input[type="password"]:focus,
          input[type="number"]:focus,
          select:focus {
              border-color: #667eea;
              box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
              background: white;
              transform: translateY(-1px);
          }

          select {
              cursor: pointer;
              background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
              background-position: right 12px center;
              background-repeat: no-repeat;
              background-size: 16px;
              -webkit-appearance: none;
              -moz-appearance: none;
              appearance: none;
          }

          .submit-btn {
              width: 100%;
              padding: 18px;
              background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
              color: white;
              border: none;
              border-radius: 12px;
              font-size: 1.1rem;
              font-weight: 600;
              cursor: pointer;
              transition: all 0.3s ease;
              position: relative;
              overflow: hidden;
              margin-top: 16px;
          }

          .submit-btn:hover {
              transform: translateY(-2px);
              box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
          }

          .submit-btn:active {
              transform: translateY(0);
          }

          .submit-btn::before {
              content: '';
              position: absolute;
              top: 0;
              left: -100%;
              width: 100%;
              height: 100%;
              background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
              transition: left 0.5s;
          }

          .submit-btn:hover::before {
              left: 100%;
          }

          .input-icon {
              position: absolute;
              left: 16px;
              top: 50%;
              transform: translateY(-50%);
              color: #a0aec0;
              pointer-events: none;
          }

          .has-icon input {
              padding-left: 48px;
          }

          @media (max-width: 640px) {
              .form-container {
                  padding: 24px;
                  margin: 10px;
              }

              .form-header h1 {
                  font-size: 2rem;
              }

              .form-row {
                  flex-direction: column;
                  gap: 0;
              }
          }

          .floating-shapes {
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              pointer-events: none;
              z-index: -1;
              overflow: hidden;
          }

          .shape {
              position: absolute;
              background: rgba(255, 255, 255, 0.1);
              border-radius: 50%;
              animation: float 20s infinite linear;
          }

          .shape:nth-child(1) {
              width: 80px;
              height: 80px;
              top: 20%;
              left: 10%;
              animation-duration: 25s;
          }

          .shape:nth-child(2) {
              width: 120px;
              height: 120px;
              top: 60%;
              right: 10%;
              animation-duration: 30s;
          }

          .shape:nth-child(3) {
              width: 60px;
              height: 60px;
              top: 80%;
              left: 20%;
              animation-duration: 20s;
          }

          @keyframes float {
              0% {
                  transform: translateY(0px) rotate(0deg);
                  opacity: 1;
              }

              50% {
                  transform: translateY(-20px) rotate(180deg);
                  opacity: 0.8;
              }

              100% {
                  transform: translateY(0px) rotate(360deg);
                  opacity: 1;
              }
          }

          .form-group input:valid {
              border-color: #48bb78;
          }

          .form-group input:invalid:not(:placeholder-shown) {
              border-color: #f56565;
          }
      </style>
  </head>

  <body>
      <div class="floating-shapes">
          <div class="shape"></div>
          <div class="shape"></div>
          <div class="shape"></div>
      </div>

      <div class="form-container">
          <div class="form-header">
              <h1>Join Us</h1>
              <p>Create your account in seconds</p>
          </div>

          <form action="{{ route('addUser') }}" method="POST" id="registrationForm">
              @csrf
              <div class="form-row">
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" id="username" name="username" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                      <label for="age">Age</label>
                      <input type="number" id="age" name="age" placeholder="Age" min="13"
                          max="120" required>
                  </div>
              </div>

              <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" id="email" name="email" placeholder="Email" required>
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" placeholder="Password" required minlength="8">
              </div>

              <div class="form-row">
                  <div class="form-group">
                      <label for="gender">Gender</label>
                      <select id="gender" name="gender" required>
                          <option value="">Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="country_id">Country</label>
                      <select id="country_id" name="country_id" required>
                          <option value="">Select Country</option>
                          @foreach ($countries as $country)
                              <option value="{{ $country->id }}">{{ $country->name }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>

              <div class="form-group">
                  <label for="role_id">Role</label>
                  <select id="role_id" name="role_id" required>
                      <option value="">Select Role</option>
                      @foreach ($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                  </select>
              </div>

              <button type="submit" class="submit-btn">
                  Register
              </button>
              <br>
              <p class="text-center">
                  Already have an account?
                  <a href="{{ route('login') }}">Sign in</a>
              </p>
          </form>
      </div>
  </body>

  </html>
