(defun sigma (n)
  (cond
   ((= n 0) 0)
   (t (+ n (sigma (- n 1))))))

(sigma 5)



(defun sum (n) 
  (cond
    ((atom n) 0)
    (t (+ (car n) (sum (cdr n))))))

(sum '(7 2 4 5))
