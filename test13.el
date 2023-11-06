(defun all_positive (n)
  (cond
   ((atom n) t)
   ((<= (car n) 0) nil)
   (t (all_positive(cdr n)))))
   
(all_positive '(3 7 4 -1 5))

